CREATE DATABASE ecograos;

-- USUARIOS

CREATE TABLE ecograos.usuarios(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    cpf CHAR(14) NOT NULL,
    celular CHAR(11) NOT NULL,
    data DATE NOT NULL,
    senha VARCHAR(355) NOT NULL,
    log_max INT DEFAULT 0, 
    bloqueado TINYINT(1) DEFAULT 0
);


-- CRUD
USE ecograos;

-- Função para Inserir um Novo Usuário (Create)
DELIMITER //
CREATE FUNCTION InserirUsuario(
  p_nome VARCHAR(255),
  p_email VARCHAR(255),
  p_cpf VARCHAR(14),
  p_data DATE,
  p_senha VARCHAR(355)
)
RETURNS INT
BEGIN
  DECLARE novo_id INT;
  
  INSERT INTO ecograos.usuarios (nome, email, cpf, data, senha)
  VALUES (p_nome, p_email, p_cpf, p_data, p_senha);
  
  SET novo_id = LAST_INSERT_ID();
  
  RETURN novo_id;
END //
DELIMITER ;

-- Procedimento para Recuperar um Usuário por ID (Read)
DELIMITER //
CREATE PROCEDURE ObterUsuarioPorID(IN p_id INT)
BEGIN
  SELECT * FROM ecograos.usuarios WHERE id = p_id;
END //
DELIMITER ;

-- Procedimento para Atualizar um Usuário por ID (Update)
CREATE DEFINER=`root`@`localhost` FUNCTION AtualizarUsuarioPorID(
  p_nome VARCHAR(255),
  p_email VARCHAR(255),
  p_cpf CHAR(14),
  p_celular CHAR(11),
  p_data DATE,
  p_id INT
)
RETURNS BOOLEAN
BEGIN
  DECLARE rows_updated INT;

  IF (SELECT COUNT(*) FROM ecograos.usuarios WHERE celular = p_celular AND id <> p_id) > 0 THEN
    RETURN FALSE; 
  END IF;

  UPDATE ecograos.usuarios
  SET nome = p_nome,
      email = p_email,
      cpf = p_cpf,
      celular = p_celular,
      data = p_data
  WHERE id = p_id;

 
  SET rows_updated = ROW_COUNT();
  IF rows_updated > 0 THEN
    RETURN TRUE; 
  ELSE
    RETURN FALSE; 
  END IF;
END;

-- Procedimento para Excluir um Usuário por ID (Delete)
DELIMITER //
CREATE PROCEDURE ExcluirUsuarioPorID(IN p_id INT)
BEGIN
  DELETE FROM ecograos.usuarios WHERE id = p_id;
END //
DELIMITER ;

-- Procedimento para Recuperar um Usuário por EMAIL 
DELIMITER //
CREATE PROCEDURE ObterUsuarioPorEMAIL(IN p_email INT)
BEGIN
  SELECT * FROM ecograos.usuarios WHERE email = p_email;
END //
DELIMITER ;

-- Adicionar valor a log_max
DELIMITER //
CREATE PROCEDURE AdicionarLogMax(IN usuarioID INT, IN novoValor INT)
BEGIN
    UPDATE ecograos.usuarios
    SET log_max = log_max + novoValor
    WHERE id = usuarioID;
END //
DELIMITER ;


-- PRODUTOS
CREATE TABLE ecograos.produtos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    categoria VARCHAR(255) NOT NULL,
    imagens VARCHAR(1000), 
    descricao TEXT,
    valor DECIMAL(10, 2), 
    nome VARCHAR(255) NOT NULL,
    detalhes TEXT
);

-- PEDIDOS
CREATE TABLE ecograos.pedidos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT,
    produto_id INT,
    quantidade INT,
    valor_total DECIMAL(10, 2),
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES ecograos.usuarios(id),
    FOREIGN KEY (produto_id) REFERENCES ecograos.produtos(id)
);

CREATE TABLE ecograos.enderecos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  rua VARCHAR(150) NOT NULL,
  cidade VARCHAR(150) NOT NULL,
  estado VARCHAR(150) NOT NULL,
  cep CHAR(50) NOT NULL,
  adicionais VARCHAR(1000)
);



SELECT * FROM ecograos.usuarios;
SELECT * FROM ecograos.produtos;
SELECT * FROM ecograos.pedidos;


-- Inserir um novo usuário
INSERT INTO ecograos.usuarios (nome, email, cpf, celular, data, senha, log_max, bloqueado)
VALUES
  ('Pedro Henrique', 'pedroh.shipolito@gmail.com', '123.456.789-01', '11999999999', '2003-11-01', '01112003', 0, 0);

-- Inserir um novo produto
INSERT INTO ecograos.produtos (categoria, imagens, descricao, valor, nome, detalhes)
VALUES
('categoria1', 'https://i.ibb.co/NYdkTP2/16.png', 'Descrição do produto 1', 19.99, 'Produto 1', 'Detalhes do produto 1'),
('categoria2', 'https://i.ibb.co/5nK6C29/14.png', 'Descrição do produto 2', 29.99, 'Produto 2', 'Detalhes do produto 2'),
('categoria3', 'https://i.ibb.co/Fw12P0b/15.png', 'Descrição do produto 3', 39.99, 'Produto 3', 'Detalhes do produto 3'),
('categoria4', 'https://i.ibb.co/615LhhL/13.png', 'Descrição do produto 4', 49.99, 'Produto 4', 'Detalhes do produto 4'),
('categoria5', 'https://i.ibb.co/HNsg5N6/12.png', 'Descrição do produto 5', 59.99, 'Produto 5', 'Detalhes do produto 5'),
('categoria1', 'https://i.ibb.co/VTNjw5P/11.png', 'Descrição do produto 6', 69.99, 'Produto 6', 'Detalhes do produto 6'),
('categoria2', 'https://i.ibb.co/n8Pn3Nn/10.png', 'Descrição do produto 7', 79.99, 'Produto 7', 'Detalhes do produto 7'),
('categoria3', 'https://i.ibb.co/Jy76Dy2/9.png', 'Descrição do produto 8', 89.99, 'Produto 8', 'Detalhes do produto 8'),
('categoria4', 'https://i.ibb.co/Jxv494d/8.png', 'Descrição do produto 9', 99.99, 'Produto 9', 'Detalhes do produto 9'),
('categoria5', 'https://i.ibb.co/sHK9XVX/6.png', 'Descrição do produto 10', 109.99, 'Produto 10', 'Detalhes do produto 10'),
('categoria1', 'https://i.ibb.co/Svbjj99/7.png', 'Descrição do produto 11', 119.99, 'Produto 11', 'Detalhes do produto 11'),
('categoria2', 'https://i.ibb.co/hLGRSjd/5.png', 'Descrição do produto 12', 129.99, 'Produto 12', 'Detalhes do produto 12'),
('categoria3', 'https://i.ibb.co/FnGNF49/4.png', 'Descrição do produto 14', 149.99, 'Produto 14', 'Detalhes do produto 14'),
('categoria5', 'https://i.ibb.co/K03W7NL/3.png', 'Descrição do produto 15', 159.99, 'Produto 15', 'Detalhes do produto 15'),
('categoria5', 'https://i.ibb.co/bW6LwJR/2.png', 'Descrição do produto 15', 159.99, 'Produto 15', 'Detalhes do produto 15');



-- Inserir um novo pedido
INSERT INTO ecograos.pedidos (usuario_id, produto_id, quantidade, valor_total)
VALUES (1, 1, 3, 149.97);

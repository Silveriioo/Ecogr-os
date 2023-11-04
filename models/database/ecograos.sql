CREATE DATABASE ecograos;

-- USUARIOS

CREATE TABLE ecograos.usuarios(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) NOT NULL,
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
DELIMITER //
CREATE PROCEDURE AtualizarUsuarioPorID(
  IN p_id INT,
  IN p_nome VARCHAR(255),
  IN p_email VARCHAR(255),
  IN p_cpf VARCHAR(14),
  IN p_data DATE,
  IN p_senha VARCHAR(355)
)
BEGIN
  UPDATE ecograos.usuarios
  SET nome = p_nome, email = p_email, cpf = p_cpf, data = p_data, senha = p_senha
  WHERE id = p_id;
END //
DELIMITER ;

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





SELECT * FROM ecograos.usuarios;
SELECT * FROM ecograos.produtos;
SELECT * FROM ecograos.pedidos;


-- Inserir um novo usuário
INSERT INTO ecograos.usuarios (nome, email, cpf, data, senha)
VALUES ('Nome do Usuário', 'usuario@email.com', '123.456.789-00', '2000-01-01', 'senha_segura');


-- Inserir um novo produto
INSERT INTO ecograos.produtos (categoria, imagens, descricao, valor, nome, detalhes)
VALUES ('Categoria do Produto', 'https://i0.wp.com/www.sindicatoruraldebelavista.com.br/wp-content/uploads/2011/06/05033449000.jpg?fit=650%2C435&ssl=1', 'Descrição do Produto', 49.99, 'Nome do Produto', 'Detalhes adicionais do produto');


-- Inserir um novo pedido
INSERT INTO ecograos.pedidos (usuario_id, produto_id, quantidade, valor_total)
VALUES (1, 1, 3, 149.97);

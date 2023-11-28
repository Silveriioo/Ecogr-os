CREATE DATABASE ecograos;

-- USUARIOS
CREATE TABLE ecograos.usuarios(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR
(255) NOT NULL,
    email VARCHAR
(255) NOT NULL,
    cpf CHAR
(14) NOT NULL,
    celular CHAR
(11) NOT NULL,
    data DATE NOT NULL,
    senha VARCHAR
(355) NOT NULL,
    rua VARCHAR
(150) NOT NULL,
    cidade VARCHAR
(150) NOT NULL,
    estado VARCHAR
(150) NOT NULL,
    cep CHAR
(50) NOT NULL,
    adicionais VARCHAR
(1000)
);

-- PRODUTOS
CREATE TABLE ecograos.produtos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    categoria VARCHAR
(255) NOT NULL,
    imagens VARCHAR
(1000), 
    descricao TEXT,
    valor DECIMAL
(10, 2), 
    nome VARCHAR
(255) NOT NULL,
    detalhes TEXT
);

-- PEDIDOS
CREATE TABLE ecograos.pedidos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT,
    produto_id INT,
    quantidade INT,
    valor_total DECIMAL
(10, 2),
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON
UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY
(usuario_id) REFERENCES ecograos.usuarios
(id),
    FOREIGN KEY
(produto_id) REFERENCES ecograos.produtos
(id)
);

-- CRUD
USE ecograos;

-- Função para Inserir um Novo Usuário (Create)
DROP FUNCTION InserirUsuario;
DELIMITER // 
CREATE DEFINER=`root`@`localhost` FUNCTION `InserirUsuario`
(
  p_nome VARCHAR
(255),
  p_email VARCHAR
(255),
  p_cpf VARCHAR
(14),
  p_data DATE,
  p_senha VARCHAR
(355)
) RETURNS int
BEGIN
    DECLARE novo_id INT;
INSERT INTO ecograos.usuarios
    (nome, email, cpf, data, senha)
VALUES
    (p_nome, p_email, p_cpf, p_data, p_senha);
SET novo_id
= LAST_INSERT_ID
();
RETURN novo_id;
END //
DELIMITER;
-- Procedimento para Recuperar um Usuário por ID (Read)
DROP PROCEDURE ObterUsuarioPorID;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObterUsuarioPorID`
(IN p_id INT)
BEGIN
    SELECT *
    FROM ecograos.usuarios
    WHERE id = p_id;
END //
DELIMITER;
-- Procedimento para Atualizar um Usuário por ID (Update)
DROP FUNCTION AtualizarUsuarioPorID;
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `AtualizarUsuarioPorID`
(
    p_nome VARCHAR
(255),
    p_email VARCHAR
(255),
    p_cpf CHAR
(14),
    p_celular CHAR
(11),
    p_data DATE,
    p_rua VARCHAR
(150),
    p_cidade VARCHAR
(150),
    p_estado VARCHAR
(150),
    p_cep CHAR
(50),
    p_adicionais VARCHAR
(1000),
    p_id INT
) RETURNS tinyint
(1)
BEGIN
    DECLARE rows_updated INT;
IF (SELECT COUNT(*)
FROM ecograos.usuarios
WHERE celular = p_celular AND id <> p_id) > 0 THEN
RETURN FALSE;
END
IF;
    UPDATE ecograos.usuarios
    SET 
        nome = p_nome,
        email = p_email,
        cpf = p_cpf,
        celular = p_celular,
        data = p_data,
        rua = p_rua,
        cidade = p_cidade,
        estado = p_estado,
        cep = p_cep,
        adicionais = p_adicionais
    WHERE id = p_id;
SET rows_updated
= ROW_COUNT
();
IF rows_updated > 0 THEN
RETURN TRUE;
ELSE
RETURN FALSE;
END
IF;
END //
DELIMITER;

-- Procedimento para Excluir um Usuário por ID (Delete)
DROP PROCEDURE ExcluirUsuarioPorID;
DELIMITER // 
CREATE DEFINER=`root`@`localhost` PROCEDURE `ExcluirUsuarioPorID`
(IN p_id INT)
BEGIN
    DELETE FROM ecograos.usuarios WHERE id = p_id;
END //
DELIMITER;

-- Procedimento para Recuperar um Usuário por EMAIL 
DROP PROCEDURE ObterUsuarioPorEMAIL;
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObterUsuarioPorEMAIL`
(IN p_email INT)
BEGIN
    SELECT *
    FROM ecograos.usuarios
    WHERE email = p_email;
END //
DELIMITER;

-- Inserir Produto
DELIMITER //

CREATE PROCEDURE InserirPedido(
    IN usuarioId INT,
    IN produtoId INT,
    IN quantidade INT,
    IN valorTotal DECIMAL
(10,2)
)
BEGIN
    INSERT INTO ecograos.pedidos
        (usuario_id, produto_id, quantidade, valor_total)
    VALUES
        (usuarioId, produtoId, quantidade, valorTotal);
END
//

DELIMITER ;

-- Remover item do carrinho
DELIMITER //

CREATE PROCEDURE RemoverPedidoPorId(IN pedidoId INT)
BEGIN
    DELETE FROM ecograos.pedidos WHERE id = pedidoId;
END
//

DELIMITER ;


SELECT *
FROM ecograos.usuarios;
SELECT *
FROM ecograos.produtos;
SELECT *
FROM ecograos.pedidos;

-- Inserir um novo pedido
INSERT INTO ecograos.pedidos
    (usuario_id, produto_id, quantidade, valor_total)
VALUES
    (1, 1, 3, 149.97);


-- Inserir um novo produto
INSERT INTO ecograos.produtos
    (categoria, imagens, descricao, valor, nome, detalhes)
VALUES
    ('Agricultura Tropical', 'https://i.ibb.co/NYdkTP2/16.png', 'O cacau é uma planta cultivada em regiões tropicais para suas sementes, que são usadas para fazer chocolate. Essas sementes são encontradas dentro de grandes frutas chamadas cápsulas. Elas são processadas para produzir cacau em pó e manteiga de cacau, os principais ingredientes do chocolate. Além de ser a base do chocolate, o cacau é rico em antioxidantes e é cultivado em países como Costa do Marfim e Gana, desempenhando um papel importante na economia dessas regiões.', 19.99, 'Cacau', 'O cacau é uma fruta cultivada em regiões tropicais para suas sementes, essenciais na produção de chocolate. Essas sementes são fermentadas, secas e processadas para extrair a manteiga e o sólido de cacau, usados na fabricação do chocolate. Além de ser base para essa delícia, o cacau é uma excelente fonte de antioxidantes e minerais, podendo oferecer benefícios à saúde. Sua produção é vital na economia de muitos países, proporcionando meios de subsistência para agricultores ao redor do mundo.'),
    ('Produção Agrícola', 'https://i.ibb.co/5nK6C29/14.png', 'O café é uma planta cultivada em climas tropicais, especialmente em países como Brasil, Vietnã e Colômbia. Suas variedades principais são Arábica e Robusta, conhecidas por diferentes sabores. Após o cultivo e colheita dos grãos maduros, eles passam por processos de secagem, descascamento e torrefação. O café é uma parte vital da economia de muitos países e é apreciado globalmente em diferentes métodos de preparo, oferecendo uma variedade de sabores aos consumidores.', 29.99, 'Café', 'O café é uma cultura agrícola vital e amplamente cultivada em áreas tropicais. Suas variedades principais são Arábica e Robusta, conhecidas por seus diferentes sabores. Após a colheita, os grãos passam por processos de secagem, descascamento e torrefação. Consumido globalmente, o café oferece uma variedade de perfis de sabor e é preparado de diversas formas, como espresso, filtrado ou em métodos tradicionais. Além de ser uma bebida apreciada, o cultivo do café desempenha um papel significativo na economia de muitos países, oferecendo meios de subsistência para agricultores.'),
    ('Agroindústria', 'https://i.ibb.co/Fw12P0b/15.png', 'A cana-de-açúcar é uma planta cultivada em climas tropicais e subtropicais, conhecida por ser a principal fonte de produção de açúcar. Seu cultivo envolve o plantio das mudas, o crescimento das plantas e a colheita das hastes maduras. As hastes são processadas para extrair o suco, que é então refinado para produzir açúcar. Além do açúcar, a cana-de-açúcar é usada na produção de etanol, na alimentação animal e em outros produtos derivados. Essa cultura desempenha um papel importante na economia de muitos países tropicais e subtropicais ao redor do mundo.', 19.99, 'Cana de Açúcar', 'A cana-de-açúcar é uma planta cultivada em regiões tropicais e subtropicais para produção de açúcar. Suas hastes são processadas para extrair o suco, que é refinado para produzir açúcar. Além disso, é usada na produção de etanol e em produtos derivados. Essa cultura desempenha um papel vital na economia de muitos países tropicais, oferecendo fonte de renda e empregos.'),
    ('Indústria Alimentícia', 'https://i.ibb.co/615LhhL/13.png', 'A cebola é um vegetal cultivado em várias regiões do mundo. Ela cresce a partir de sementes, bulbos ou mudas e é conhecida por seu sabor característico. Rica em nutrientes como vitaminas e minerais, é usada em uma variedade de pratos culinários ao redor do mundo, desde saladas até pratos principais. A cebola é valorizada por seu papel na culinária e por sua versatilidade, além de ser armazenada por longos períodos quando mantida em condições adequadas.', 19.99, 'Cebola', 'A cebola é um vegetal comum cultivado em diversas regiões do mundo. Reconhecida por sua cor variando entre branca, amarela e roxa, é valorizada por seu sabor característico. Rica em nutrientes como vitaminas e minerais, é usada em uma variedade de pratos culinários, desde saladas até pratos principais. Além de seu uso na culinária, a cebola é apreciada por seu potencial para promover a saúde, oferecendo antioxidantes e propriedades anti-inflamatórias.'),
    ('Indústria Alimentícia', 'https://i.ibb.co/HNsg5N6/12.png', 'O girassol é uma planta conhecida por suas flores brilhantes e sementes nutritivas. Cultivado em climas ensolarados, é uma fonte importante de óleo vegetal. Suas sementes são consumidas como petiscos e também usadas em várias receitas culinárias. Além disso, o óleo de girassol é usado na culinária e na produção de margarina. A planta também é apreciada como ornamento devido ao tamanho impressionante das flores e sua coloração vibrante.', 19.99, 'Girasol', 'O girassol é uma planta conhecida por suas flores brilhantes e sementes nutritivas. Cultivado em áreas ensolaradas, é uma fonte importante de óleo vegetal. Suas sementes são consumidas como petiscos e usadas em várias receitas culinárias. Além disso, o óleo de girassol é utilizado na culinária e na produção de margarina. A planta é valorizada como ornamento devido ao tamanho impressionante das flores e suas cores vibrantes.'),
    ('Indústria Alimentícia', 'https://i.ibb.co/VTNjw5P/11.png', 'As lentilhas são leguminosas populares e altamente nutritivas. Cultivadas em várias regiões, são uma excelente fonte de proteínas, fibras, vitaminas e minerais. Comumente usadas na culinária em sopas, saladas e guisados, as lentilhas são valorizadas por seu sabor versátil e por contribuir para uma dieta saudável. Além disso, são fáceis de armazenar e oferecem benefícios à saúde, como controle do açúcar no sangue e suporte à saúde cardíaca.', 29.99, 'Lentilha', 'A lentilha é uma leguminosa popular e altamente nutritiva. Cultivada em várias regiões, é uma excelente fonte de proteínas, fibras, vitaminas e minerais. É comumente usada na culinária em sopas, saladas e guisados, sendo valorizada por seu sabor versátil e contribuição para uma dieta saudável. Além disso, as lentilhas são fáceis de armazenar e oferecem benefícios à saúde, incluindo controle do açúcar no sangue e suporte à saúde cardíaca.'),
    ('Indústria Alimentícia', 'https://i.ibb.co/n8Pn3Nn/10.png', 'A melancia é uma fruta refrescante e popular, especialmente durante os meses mais quentes. Rica em água, é conhecida por seu sabor doce e suculento. Além de ser uma excelente fonte de hidratação, a melancia é baixa em calorias e contém vitaminas, como a vitamina C, além de oferecer benefícios antioxidantes. É consumida principalmente fresca, mas também pode ser usada em sucos, saladas de frutas e smoothies, sendo apreciada por seu sabor refrescante e seus nutrientes.', 19.99, 'Melancia', 'A melancia é uma fruta refrescante e suculenta, conhecida por sua polpa vermelha e alta concentração de água. É rica em vitaminas, especialmente a vitamina C, e oferece benefícios antioxidantes devido ao licopeno. Consumida principalmente fresca, é uma escolha popular durante os meses quentes devido ao seu sabor doce e propriedades hidratantes. É apreciada por sua versatilidade em receitas, sucos e saladas de frutas, oferecendo um sabor refrescante e benefícios nutricionais.'),
    ('Indústria Alimentícia', 'https://i.ibb.co/Jy76Dy2/9.png', 'O trigo é um dos cereais mais cultivados no mundo. É uma fonte vital de carboidratos e é usado na produção de uma variedade de alimentos, como pães, massas, cereais e bolos. Existem diferentes tipos de trigo, sendo os mais comuns o trigo duro e o trigo macio. Seu cultivo requer condições climáticas específicas, como umidade e temperaturas moderadas. O trigo é valorizado por sua versatilidade na culinária e por seu papel essencial na alimentação global, sendo um dos pilares da agricultura em muitas regiões.', 29.99, 'Trigo', 'O trigo é um dos cereais mais cultivados globalmente. É uma fonte essencial de carboidratos e é utilizado na produção de diversos alimentos, como pães, massas, cereais e bolos. Existem diferentes variedades de trigo, como o trigo duro e o trigo macio. Seu cultivo requer condições específicas, incluindo umidade e temperaturas moderadas. Valorizado por sua versatilidade na culinária, o trigo desempenha um papel vital na dieta humana, sendo um dos principais alimentos básicos em várias partes do mundo.'),
    ('Indústria Alimentícia', 'https://i.ibb.co/Jxv494d/8.png', 'O açaí é uma fruta originária da região amazônica do Brasil. É reconhecido por sua cor roxa escura e é consumido principalmente na forma de polpa. Rico em antioxidantes, vitaminas e minerais, o açaí é valorizado por seus potenciais benefícios à saúde, como fortalecimento do sistema imunológico e melhoria da saúde da pele. É frequentemente consumido em forma de smoothies, tigelas de açaí e sucos, sendo popular por seu sabor único e propriedades nutritivas.', 19.99, 'Açaí', 'O açaí é uma fruta nativa da região amazônica, reconhecida por sua cor roxa escura e sabor único. É valorizado por seu alto teor de antioxidantes, incluindo antocianinas, e é considerado um superalimento devido à sua densidade nutricional. Consumido principalmente na forma de polpa, é usado em tigelas de açaí, smoothies e sorvetes. Além de seu sabor delicioso, o açaí é elogiado por seus possíveis benefícios à saúde, como apoio ao sistema imunológico e à saúde da pele.'),
    ('CeIndústria Alimentícian', 'https://i.ibb.co/sHK9XVX/6.png', 'A cenoura é uma raiz comestível e vibrante, conhecida por sua cor alaranjada e seu alto teor de betacaroteno, um antioxidante que o corpo converte em vitamina A. É uma fonte excelente de fibras, vitaminas e minerais essenciais para a saúde, incluindo vitamina K, potássio e antioxidantes. Além de ser consumida crua, a cenoura é utilizada em uma variedade de pratos culinários, como saladas, sopas, refogados e pratos principais, oferecendo sabor e valor nutricional.', 9.99, 'Cenoura', 'A cenoura é um vegetal de raiz comum, reconhecido por sua cor vibrante laranja e sabor doce. É uma excelente fonte de beta-caroteno, um antioxidante que o corpo converte em vitamina A, importante para a saúde dos olhos e da pele. Além disso, é rica em vitaminas, minerais e fibras dietéticas. Consumida crua ou cozida, é usada em uma variedade de pratos, como saladas, sopas, cozidos e pratos principais. Valorizada por sua versatilidade na culinária e por seus benefícios nutricionais, a cenoura é um componente fundamental de muitas dietas saudáveis.'),
    ('Indústria Alimentícia', 'https://i.ibb.co/Svbjj99/7.png', 'O morango é uma fruta vermelha e suculenta, reconhecida por seu sabor doce e aroma característico. É uma excelente fonte de vitamina C, antioxidantes e fibras. Consumido fresco, é utilizado em diversas receitas, como sobremesas, saladas de frutas, smoothies e sorvetes. Além de seu sabor delicioso, o morango oferece benefícios à saúde, contribuindo para a saúde do coração, fortalecimento do sistema imunológico e auxílio na digestão devido ao seu teor de fibras.', 19.99, 'Morango', 'O morango é uma fruta vermelha suculenta conhecida por seu sabor doce e aroma distinto. É uma excelente fonte de vitamina C, antioxidantes e fibras. Consumido fresco, é utilizado em uma variedade de pratos, como sobremesas, saladas de frutas, smoothies e sorvetes. Além de seu sabor delicioso, o morango oferece benefícios à saúde, incluindo suporte ao sistema imunológico, redução do risco de certas doenças e melhoria da saúde da pele.'),
    ('Agroindústria', 'https://i.ibb.co/hLGRSjd/5.png', 'O amaranto é um grão antigo, altamente nutritivo e versátil. Conhecido por ser uma excelente fonte de proteínas completas, contém todos os aminoácidos essenciais. Além disso, é rico em fibras, minerais como cálcio, ferro e magnésio, e vitaminas. Pode ser consumido em grãos, farinha ou flocos, sendo usado em pratos como mingaus, pães, biscoitos e até mesmo como substituto de grãos tradicionais. É valorizado por sua densidade nutricional e adaptabilidade culinária.', 19.99, 'Amaranto', 'O amaranto é um grão antigo valorizado por sua densidade nutricional. É uma excelente fonte de proteínas completas, contendo todos os aminoácidos essenciais, além de ser rico em fibras, vitaminas e minerais, como cálcio e ferro. Consumido em grãos, farinha ou flocos, é utilizado em diversos pratos, como mingaus, pães, biscoitos e até como substituto de grãos tradicionais. O amaranto é elogiado por sua contribuição para dietas balanceadas e por seus benefícios à saúde, como suporte ao sistema imunológico e à saúde óssea.'),
    ('Indústria Alimentícia', 'https://i.ibb.co/FnGNF49/4.png', 'O milho é um cereal amplamente cultivado e versátil. Conhecido por suas espigas amarelas, é usado em uma variedade de formas. É uma fonte de carboidratos, fibras e vitaminas, como a vitamina C, além de conter antioxidantes e minerais como o potássio. Utilizado em várias culinárias, o milho pode ser consumido fresco, cozido, assado, em conserva, ou transformado em farinha para fazer pães, tortilhas, pipoca e uma grande variedade de pratos doces e salgados. É uma cultura importante em muitas regiões do mundo e tem um papel significativo na dieta humana e na indústria alimentícia.', 14.99, 'Milho', 'O milho é um cereal amplamente cultivado e versátil. É reconhecido por suas espigas amarelas, mas também pode ser encontrado em outras cores. É uma fonte importante de carboidratos, fibras, vitaminas, como a vitamina C, e minerais, incluindo o potássio. É utilizado em diversas culinárias e pode ser consumido fresco, cozido, assado, em conserva, ou transformado em farinha para produção de pães, tortilhas, pipoca e uma grande variedade de pratos doces e salgados. O milho desempenha um papel crucial na dieta humana e na indústria alimentícia, sendo uma cultura significativa em muitas regiões ao redor do mundo.'),
    ('Indústria Alimentícia', 'https://i.ibb.co/K03W7NL/3.png', 'O tomate é uma fruta, frequentemente considerado e utilizado como um vegetal na culinária. É conhecido por sua cor vermelha vibrante, mas também pode ser encontrado em outras cores. Rico em vitaminas C, K e antioxidantes como o licopeno, o tomate oferece benefícios à saúde, incluindo a promoção da saúde cardíaca e a redução do risco de certos tipos de câncer. É um ingrediente versátil usado em saladas, molhos, sopas, sanduíches, e muitos outros pratos em diversas cozinhas ao redor do mundo.', 15.99, 'Tomate', 'O tomate é uma fruta frequentemente usado como um vegetal na culinária. Reconhecido por sua cor vibrante que varia entre vermelho, amarelo e até roxo, é uma rica fonte de vitaminas, principalmente a vitamina C, e minerais como o potássio. Consumido fresco ou cozido, é usado em saladas, molhos, sopas, sanduíches e diversos pratos ao redor do mundo. Além de seu papel na culinária, o tomate é elogiado por seus antioxidantes, como o licopeno, que pode contribuir para a saúde do coração e da pele.'),
    ('Indústria Alimentícia', 'https://i.ibb.co/bW6LwJR/2.png', 'A soja é uma leguminosa de grande importância na alimentação humana e animal. É uma fonte rica de proteínas completas, fornecendo todos os aminoácidos essenciais. Além disso, é uma excelente fonte de fibras, vitaminas, minerais e fitonutrientes. É consumida de várias formas, como grãos inteiros, tofu, leite de soja, óleo de soja e tem um papel crucial na produção de alimentos processados, como substituto de carne, leite e em muitos pratos da culinária asiática. A soja também é valorizada por seus benefícios à saúde, incluindo a redução do risco de doenças cardíacas e o suporte à saúde óssea.', 15.99, 'Soja', 'A soja é uma leguminosa versátil e altamente nutritiva. É uma excelente fonte de proteína completa, contendo todos os aminoácidos essenciais, além de ser rica em fibras, vitaminas e minerais. Consumida em diferentes formas, como grãos inteiros, tofu, leite de soja e óleo de soja, é um ingrediente fundamental na culinária asiática e em alimentos processados. Valorizada por seus benefícios à saúde, a soja pode ajudar na redução do risco de doenças cardíacas, proporcionar suporte à saúde óssea e oferecer benefícios para a saúde das mulheres na menopausa. Além disso, a soja desempenha um papel significativo na agricultura e na indústria alimentícia global.');


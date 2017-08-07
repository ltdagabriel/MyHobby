drop schema if exists MyHobby;
create schema MyHobby;
ALTER DATABASE MyHobby CHARACTER SET utf8 COLLATE utf8_general_ci;
use MyHobby;
CREATE TABLE Estudio (
 codigo INT NOT NULL UNIQUE AUTO_INCREMENT,
 nome TEXT
);

ALTER TABLE Estudio ADD CONSTRAINT PK_Estudio PRIMARY KEY (codigo);


CREATE TABLE Foto (
 codigo INT NOT NULL UNIQUE AUTO_INCREMENT,
 url TEXT,
 legenda TEXT
);

ALTER TABLE Foto ADD CONSTRAINT PK_Foto PRIMARY KEY (codigo);


CREATE TABLE Genero (
 codigo INT NOT NULL UNIQUE AUTO_INCREMENT,
 nome TEXT NOT NULL
);

ALTER TABLE Genero ADD CONSTRAINT PK_Genero PRIMARY KEY (codigo);


CREATE TABLE Idioma (
 codigo INT NOT NULL UNIQUE AUTO_INCREMENT,
 lingua VARCHAR(20),
 pais VARCHAR(20)
);

ALTER TABLE Idioma ADD CONSTRAINT PK_Idioma PRIMARY KEY (codigo);


CREATE TABLE Legenda (
 codigo INT NOT NULL UNIQUE AUTO_INCREMENT,
 lingua VARCHAR(20),
 pais VARCHAR(20)
);

ALTER TABLE Legenda ADD CONSTRAINT PK_Legenda PRIMARY KEY (codigo);


CREATE TABLE Obra (
 codigo INT NOT NULL UNIQUE AUTO_INCREMENT,
 validacao VARCHAR(5) DEFAULT 'false',
 titulo TEXT,
 titulo_oficial TEXT
);

ALTER TABLE Obra ADD CONSTRAINT PK_Obra PRIMARY KEY (codigo);


CREATE TABLE usuario (
 codigo INT NOT NULL UNIQUE AUTO_INCREMENT,
 login CHAR(32) NOT NULL,
 password CHAR(16) NOT NULL
);

ALTER TABLE usuario ADD CONSTRAINT PK_usuario PRIMARY KEY (codigo);


CREATE TABLE Video (
 codigo INT NOT NULL UNIQUE AUTO_INCREMENT,
 url TEXT,
 duracao DOUBLE PRECISION,
 qualidade CHAR(16),
 legenda INT,
 audio INT
);

ALTER TABLE Video ADD CONSTRAINT PK_Video PRIMARY KEY (codigo);


CREATE TABLE Adicionado_obra (
 codigo_usuario INT NOT NULL,
 codigo_obra INT NOT NULL,
 data DATETIME NOT NULL
);

ALTER TABLE Adicionado_obra ADD CONSTRAINT PK_Adicionado_obra PRIMARY KEY (codigo_usuario,codigo_obra);


CREATE TABLE Anime (
 codigo INT NOT NULL,
 numero_temporada INT,
 lancamento DATE
);

ALTER TABLE Anime ADD CONSTRAINT PK_Anime PRIMARY KEY (codigo);

CREATE TABLE Light_novel (
 codigo INT NOT NULL,
 lancamento DATE
);

ALTER TABLE Light_novel ADD CONSTRAINT PK_Light_Novel PRIMARY KEY (codigo);


CREATE TABLE Comentario (
 data DATETIME NOT NULL,
 obra_codigo INT NOT NULL,
 usuario_codigo INT NOT NULL,
 texto TEXT,
 data_update DATETIME
);

ALTER TABLE Comentario ADD CONSTRAINT PK_Comentario PRIMARY KEY (data,obra_codigo,usuario_codigo);


CREATE TABLE Episodio (
 codigo INT NOT NULL UNIQUE AUTO_INCREMENT,
 codigo_video INT NOT NULL,
 numero_episodio INT NOT NULL,
 nome_episodio TEXT,
 lancado DATE,
 data_update DATETIME
);

ALTER TABLE Episodio ADD CONSTRAINT PK_Episodio PRIMARY KEY (codigo);


CREATE TABLE Especificacao (
 codigo_obra INT NOT NULL,
 lancamento DATETIME,
 imagem INT,
 trailer INT,
 estudio INT,
 sinopse TEXT
);

ALTER TABLE Especificacao ADD CONSTRAINT PK_Especificacao PRIMARY KEY (codigo_obra);


CREATE TABLE ListEpisodio (
 codigo_episodio INT NOT NULL,
 codigo_anime INT NOT NULL
);

ALTER TABLE ListEpisodio ADD CONSTRAINT PK_ListEpisodio PRIMARY KEY (codigo_episodio,codigo_anime);


CREATE TABLE ListGenero (
 codigo_genero INT NOT NULL,
 codigo_obra INT NOT NULL
);

ALTER TABLE ListGenero ADD CONSTRAINT PK_ListGenero PRIMARY KEY (codigo_genero,codigo_obra);


CREATE TABLE Perfil (
 codigo_usuario INT NOT NULL,
 nome VARCHAR(50),
 foto INT
);

ALTER TABLE Perfil ADD CONSTRAINT PK_Perfil PRIMARY KEY (codigo_usuario);


CREATE TABLE Adicionado_episodio (
 codigo_episodio INT NOT NULL,
 codigo_usuario INT NOT NULL,
 data DATETIME
);

ALTER TABLE Adicionado_episodio ADD CONSTRAINT PK_Adicionado_episodio PRIMARY KEY (codigo_episodio,codigo_usuario);


ALTER TABLE Video ADD CONSTRAINT FK_Video_0 FOREIGN KEY (legenda) REFERENCES Legenda (codigo);
ALTER TABLE Video ADD CONSTRAINT FK_Video_1 FOREIGN KEY (audio) REFERENCES Idioma (codigo);


ALTER TABLE Adicionado_obra ADD CONSTRAINT FK_Adicionado_obra_0 FOREIGN KEY (codigo_usuario) REFERENCES usuario (codigo);
ALTER TABLE Adicionado_obra ADD CONSTRAINT FK_Adicionado_obra_1 FOREIGN KEY (codigo_obra) REFERENCES Obra (codigo);


ALTER TABLE Anime ADD CONSTRAINT FK_Anime_0 FOREIGN KEY (codigo) REFERENCES Obra (codigo);


ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_0 FOREIGN KEY (obra_codigo) REFERENCES Obra (codigo);
ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_1 FOREIGN KEY (usuario_codigo) REFERENCES usuario (codigo);


ALTER TABLE Episodio ADD CONSTRAINT FK_Episodio_0 FOREIGN KEY (codigo_video) REFERENCES Video (codigo);


ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_0 FOREIGN KEY (codigo_obra) REFERENCES Obra (codigo);
ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_1 FOREIGN KEY (imagem) REFERENCES Foto (codigo);
ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_2 FOREIGN KEY (trailer) REFERENCES Video (codigo);
ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_3 FOREIGN KEY (estudio) REFERENCES Estudio (codigo);


ALTER TABLE ListEpisodio ADD CONSTRAINT FK_ListEpisodio_0 FOREIGN KEY (codigo_episodio) REFERENCES Episodio (codigo);
ALTER TABLE ListEpisodio ADD CONSTRAINT FK_ListEpisodio_1 FOREIGN KEY (codigo_anime) REFERENCES Anime (codigo);


ALTER TABLE ListGenero ADD CONSTRAINT FK_ListGenero_0 FOREIGN KEY (codigo_genero) REFERENCES Genero (codigo);
ALTER TABLE ListGenero ADD CONSTRAINT FK_ListGenero_1 FOREIGN KEY (codigo_obra) REFERENCES Especificacao (codigo_obra);


ALTER TABLE Perfil ADD CONSTRAINT FK_Perfil_0 FOREIGN KEY (codigo_usuario) REFERENCES usuario (codigo);
ALTER TABLE Perfil ADD CONSTRAINT FK_Perfil_1 FOREIGN KEY (foto) REFERENCES Foto (codigo);


ALTER TABLE Adicionado_episodio ADD CONSTRAINT FK_Adicionado_episodio_0 FOREIGN KEY (codigo_episodio) REFERENCES Episodio (codigo);
ALTER TABLE Adicionado_episodio ADD CONSTRAINT FK_Adicionado_episodio_1 FOREIGN KEY (codigo_usuario) REFERENCES usuario (codigo);

INSERT INTO genero (codigo,nome) VALUES 
(1,'Ecchi'),
(2,'Ação'),
(3,'Aventura'),
(4,'Faroeste'),
(5,'Romance'),
(6,'Drama'),
(7,'Comédia'),
(8,'Paródia'),
(9,'Sci-Fi'),
(10,'Terror'),
(11,'Guerra'),
(12,'Misterio'),
(13,'Games'),
(14,'Esportes'),
(15,'Artes Marciais'),
(16,'Magia'),
(17,'Magical Girfriend'),
(18,'Fantasia'),
(19,'Vida Escolar'),
(20,'Shõjo'),
(21,'Josei'),
(22,'Shounen'),
(23,'Seinen'),
(24,'Slice-of-life'),
(25,'Harem'),
(26,'Mecha'),
(27,'Escolar');

INSERT INTO obra (codigo,titulo,titulo_oficial) value (1,"Knight's and Magic","ナイツ＆マジック");
INSERT INTO Light_novel (codigo,lancamento) value (1,"2014-09-17");
INSERT INTO anime (codigo,lancamento,numero_temporada) value (1,"2017-07-02",1);
INSERT INTO foto(codigo,url,legenda) value (1,"http://4.bp.blogspot.com/-yEYZ94e9WSU/VB8AjpDyhzI/AAAAAAAAAY4/2_4dQ-M-cb4/s1600/71192.jpg","knights and Magic");
INSERT INTO foto(codigo,url,legenda) value (2,"https://upload.wikimedia.org/wikipedia/commons/b/b8/No_foto.svg","no-image");
INSERT INTO video(codigo,url) value(1,"https://www.youtube.com/watch?v=p4gSzsfTsFA");
INSERT INTO estudio(codigo,nome) value (1,"Square Enix");
INSERT INTO especificacao(codigo_obra,lancamento,imagem,trailer,estudio,sinopse) value (1,"2013-01-30",1,1,1,"Um gênio da programação e otaku fanático por mechas renascem num mundo de cavaleiros e magia, onde gigantescos robôs chamados de Silhouette Knights correm por toda parte! Renascido como Ernesti Echevalier, ele usa seu vasto conhecimento de máquinas e programação para fazer o robô supremo. Contudo, suas ações produzem resultados inesperados?! Os sonhos de um fanático de mechas vai mudar o mundo!");
INSERT INTO usuario(codigo,login,password) value (1,"ltdagabriel","123456");
INSERT INTO perfil value (1,"Bossum",2);
INSERT INTO adicionado_obra value (1,1,"2017-08-01 16:09:00");
INSERT INTO listgenero(codigo_genero,codigo_obra) values 
(2,1),
(3,1),
(7,1),
(18,1),
(25,1),
(26,1),
(16,1),
(5,1),
(27,1);
insert into video(codigo,url) values (2,"https://v.vrv.co/evs/3778de0dc3bca8751a6dbc966528b130/assets/25a9667cd364879dd8f8ee13173ba62e_3267532.mp4/index-v1-a1.m3u8?Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cHM6Ly92LnZydi5jby9ldnMvMzc3OGRlMGRjM2JjYTg3NTFhNmRiYzk2NjUyOGIxMzAvKiIsIkNvbmRpdGlvbiI6eyJEYXRlTGVzc1RoYW4iOnsiQVdTOkVwb2NoVGltZSI6MTUwMTg1ODgxMX19fV19&Signature=ARn7aJL6MXyEh9010XMuQeoF75KdzZKpFYu5eG6Mhxyu7cimBzxoyUGQDXNwpDYFXdngBeKDGtXMLYPH36z1nRwc8PhYvRYYieIZ7ojo1v8Zj~gPThPI~bUvxGgcS1tRrn4Qoe7gJdprHMpMAyeldsRnnVdsSSC5NrAG1~Tl3q8VzVAaSzuZUVhN~LchB~na0vtf665vPAaDPhdlfrj9L90PpJCA8EFhFkwMXMRj7Q9aPJG9ODNWaXC1I-6ARbtD94j0DJ9SCccQu2TL~RgxTJr5gnJ5SgLSdMMhB2uVd8wPIXfmPHMUVGePanMizehZJ5Q2-oabSGIXV~fbG9p1Kg__&Key-Pair-Id=APKAJKQQ2INNHTYFB44A");
INSERT INTO episodio(codigo,codigo_video,numero_episodio,lancado,nome_episodio) values (1,2,1,"2017-07-02","Robots & Fantasy");
INSERT INTO listepisodio(codigo_episodio,codigo_anime) values (1,1);
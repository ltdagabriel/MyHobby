drop schema if exists MyHobby;
create schema MyHobby;
use MyHobby;

CREATE TABLE Comentario (
 codigo INT NOT NULL AUTO_INCREMENT,
 data DATETIME default CURRENT_TIMESTAMP,
 texto TEXT,
 unique key (codigo)
);

ALTER TABLE Comentario ADD CONSTRAINT PK_Comentario PRIMARY KEY (codigo);

CREATE TABLE Estudio (
 codigo INT NOT NULL AUTO_INCREMENT,
 nome TEXT,
 unique key (codigo)
);

ALTER TABLE Estudio ADD CONSTRAINT PK_Estudio PRIMARY KEY (codigo);


CREATE TABLE Foto (
 codigo INT NOT NULL AUTO_INCREMENT,
 url TEXT,
 legenda TEXT,
 unique key (codigo)
);

ALTER TABLE Foto ADD CONSTRAINT PK_Foto PRIMARY KEY (codigo);


CREATE TABLE Genero (
 codigo INT NOT NULL AUTO_INCREMENT,
 nome TEXT NOT NULL,
 unique key (codigo)
);

ALTER TABLE Genero ADD CONSTRAINT PK_Genero PRIMARY KEY (codigo);


CREATE TABLE Idioma (
 codigo INT NOT NULL AUTO_INCREMENT,
 lingua TEXT,
 pais TEXT,
 unique key (codigo)
);

ALTER TABLE Idioma ADD CONSTRAINT PK_Idioma PRIMARY KEY (codigo);


CREATE TABLE Legenda (
 codigo INT NOT NULL AUTO_INCREMENT,
 lingua TEXT,
 pais TEXT,
 unique key (codigo)
);

ALTER TABLE Legenda ADD CONSTRAINT PK_Legenda PRIMARY KEY (codigo);


CREATE TABLE usuario (
 codigo INT NOT NULL AUTO_INCREMENT,
 login varchar(32) NOT NULL,
 password varchar(16) NOT NULL,
 unique key (codigo)
);

ALTER TABLE usuario ADD CONSTRAINT PK_usuario PRIMARY KEY (codigo);


CREATE TABLE Video (
 codigo INT NOT NULL AUTO_INCREMENT,
 url TEXT,
 duracao DOUBLE PRECISION,
 qualidade varchar(16),
 legenda INT,
 audio INT,
 unique key (codigo)
);

ALTER TABLE Video ADD CONSTRAINT PK_Video PRIMARY KEY (codigo);


CREATE TABLE Obra (
 codigo INT NOT NULL AUTO_INCREMENT,
 validacao varchar(5) DEFAULT 'false',
 comentario INT,
 adicionado DATETIME DEFAULT NOW(),
 adicionado_by INT,
 unique key (codigo)
);

ALTER TABLE Obra ADD CONSTRAINT PK_Anime PRIMARY KEY (codigo);


CREATE TABLE Episodio (
 codigo_anime INT NOT NULL,
 codigo_video INT NOT NULL,
 numero_episodio INT,
 numero_temporada INT,
 no_ar DATE,
 adicionado DATETIME default NOW(),
 adicionado_by INT
);

ALTER TABLE Episodio ADD CONSTRAINT PK_Episodio PRIMARY KEY (codigo_anime,codigo_video);


CREATE TABLE Especificacao (
 codigo_obra INT NOT NULL,
 lancamento DATETIME,
 imagem INT,
 trailer INT,
 genero INT,
 sinopse TEXT,
 titulo TEXT,
 titulo_oficial TEXT,
 estudio INT
);

ALTER TABLE Especificacao ADD CONSTRAINT PK_Especificacao PRIMARY KEY (codigo_obra);


CREATE TABLE Perfil (
 codigo INT NOT NULL,
 nome TEXT(10),
 foto INT
);

ALTER TABLE Perfil ADD CONSTRAINT PK_Perfil PRIMARY KEY (codigo);


ALTER TABLE Video ADD CONSTRAINT FK_Video_0 FOREIGN KEY (legenda) REFERENCES Legenda (codigo);
ALTER TABLE Video ADD CONSTRAINT FK_Video_1 FOREIGN KEY (audio) REFERENCES Idioma (codigo);


ALTER TABLE Obra ADD CONSTRAINT FK_Obra_0 FOREIGN KEY (comentario) REFERENCES Comentario (codigo);
ALTER TABLE Obra ADD CONSTRAINT FK_Obra_1 FOREIGN KEY (adicionado_by) REFERENCES usuario (codigo);


ALTER TABLE Episodio ADD CONSTRAINT FK_Episodio_0 FOREIGN KEY (codigo_anime) REFERENCES Anime (codigo);
ALTER TABLE Episodio ADD CONSTRAINT FK_Episodio_1 FOREIGN KEY (codigo_video) REFERENCES Video (codigo);
ALTER TABLE Episodio ADD CONSTRAINT FK_Episodio_2 FOREIGN KEY (adicionado_by) REFERENCES usuario (codigo);


ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_0 FOREIGN KEY (codigo_obra) REFERENCES Anime (codigo);
ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_1 FOREIGN KEY (imagem) REFERENCES Foto (codigo);
ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_2 FOREIGN KEY (trailer) REFERENCES Video (codigo);
ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_3 FOREIGN KEY (genero) REFERENCES Genero (codigo);
ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_4 FOREIGN KEY (estudio) REFERENCES Estudio (codigo);


ALTER TABLE Perfil ADD CONSTRAINT FK_Perfil_0 FOREIGN KEY (codigo) REFERENCES usuario (codigo);
ALTER TABLE Perfil ADD CONSTRAINT FK_Perfil_1 FOREIGN KEY (foto) REFERENCES Foto (codigo);



CREATE TABLE Comentario (
 codigo INT NOT NULL,
 data DATETIME,
 texto TEXT
);

ALTER TABLE Comentario ADD CONSTRAINT PK_Comentario PRIMARY KEY (codigo);


CREATE TABLE Estudio (
 codigo INT NOT NULL,
 nome TEXT
);

ALTER TABLE Estudio ADD CONSTRAINT PK_Estudio PRIMARY KEY (codigo);

CREATE UNIQUE INDEX unique ON Estudio (codigo);


CREATE TABLE Foto (
 codigo INT NOT NULL,
 url TEXT,
 legenda TEXT
);

ALTER TABLE Foto ADD CONSTRAINT PK_Foto PRIMARY KEY (codigo);


CREATE TABLE Genero (
 codigo INT NOT NULL,
 nome TEXT NOT NULL
);

ALTER TABLE Genero ADD CONSTRAINT PK_Genero PRIMARY KEY (codigo);


CREATE TABLE Idioma (
 codigo INT NOT NULL,
 lingua VARCHAR(20),
 pais VARCHAR(20)
);

ALTER TABLE Idioma ADD CONSTRAINT PK_Idioma PRIMARY KEY (codigo);


CREATE TABLE Legenda (
 codigo INT NOT NULL,
 lingua VARCHAR(20),
 pais VARCHAR(20)
);

ALTER TABLE Legenda ADD CONSTRAINT PK_Legenda PRIMARY KEY (codigo);


CREATE TABLE qualidade (
 Attribute21 CHAR(10)
);


CREATE TABLE usuario (
 codigo INT NOT NULL,
 login CHAR(32) NOT NULL,
 password CHAR(16) NOT NULL
);

ALTER TABLE usuario ADD CONSTRAINT PK_usuario PRIMARY KEY (codigo);


CREATE TABLE Video (
 codigo INT NOT NULL,
 url TEXT,
 duracao DOUBLE PRECISION,
 qualidade CHAR(16),
 legenda INT,
 audio INT
);

ALTER TABLE Video ADD CONSTRAINT PK_Video PRIMARY KEY (codigo);


CREATE TABLE Anime (
 codigo INT NOT NULL,
 validacao VARCHAR(5) DEFAULT 'false',
 comentario INT,
 adicionado DATETIME DEFAULT NOW DEFAULT getdate(),
 adicionado_by INT
);

ALTER TABLE Anime ADD CONSTRAINT PK_Anime PRIMARY KEY (codigo);


CREATE TABLE Episodio (
 codigo_anime INT NOT NULL,
 codigo_video INT NOT NULL,
 numero_episodio INT,
 numero_temporada INT,
 no_ar DATE,
 adicionado DATETIME DEFAULT NOW DEFAULT getdate(),
 adicionado_by INT
);

ALTER TABLE Episodio ADD CONSTRAINT PK_Episodio PRIMARY KEY (codigo_anime,codigo_video);


CREATE TABLE Especificacao (
 codigo_obra INT NOT NULL,
 lancamento DATETIME,
 auto_increment_0 INT,
 trailer INT,
 auto_increment_2 INT,
 auto_increment_1 INT
);

ALTER TABLE Especificacao ADD CONSTRAINT PK_Especificacao PRIMARY KEY (codigo_obra);


CREATE TABLE Perfil (
 codigo INT NOT NULL,
 nome VARCHAR(50),
 foto INT
);

ALTER TABLE Perfil ADD CONSTRAINT PK_Perfil PRIMARY KEY (codigo);


ALTER TABLE Video ADD CONSTRAINT FK_Video_0 FOREIGN KEY (legenda) REFERENCES Legenda (codigo);
ALTER TABLE Video ADD CONSTRAINT FK_Video_1 FOREIGN KEY (audio) REFERENCES Idioma (codigo);


ALTER TABLE Anime ADD CONSTRAINT FK_Anime_0 FOREIGN KEY (comentario) REFERENCES Comentario (codigo);
ALTER TABLE Anime ADD CONSTRAINT FK_Anime_1 FOREIGN KEY (adicionado_by) REFERENCES usuario (codigo);


ALTER TABLE Episodio ADD CONSTRAINT FK_Episodio_0 FOREIGN KEY (codigo_anime) REFERENCES Anime (codigo);
ALTER TABLE Episodio ADD CONSTRAINT FK_Episodio_1 FOREIGN KEY (codigo_video) REFERENCES Video (codigo);
ALTER TABLE Episodio ADD CONSTRAINT FK_Episodio_2 FOREIGN KEY (adicionado_by) REFERENCES usuario (codigo);


ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_0 FOREIGN KEY (codigo_obra) REFERENCES Anime (codigo);
ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_1 FOREIGN KEY (auto_increment_0) REFERENCES Foto (codigo);
ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_2 FOREIGN KEY (trailer) REFERENCES Video (codigo);
ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_3 FOREIGN KEY (auto_increment_2) REFERENCES Genero (codigo);
ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_4 FOREIGN KEY (auto_increment_1) REFERENCES Estudio (codigo);


ALTER TABLE Perfil ADD CONSTRAINT FK_Perfil_0 FOREIGN KEY (codigo) REFERENCES usuario (codigo);
ALTER TABLE Perfil ADD CONSTRAINT FK_Perfil_1 FOREIGN KEY (foto) REFERENCES Foto (codigo);



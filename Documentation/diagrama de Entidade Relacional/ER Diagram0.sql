CREATE TABLE Estudio (
 codigo INT NOT NULL,
 nome TEXT
);

ALTER TABLE Estudio ADD CONSTRAINT PK_Estudio PRIMARY KEY (codigo);


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


CREATE TABLE Obra (
 codigo INT NOT NULL,
 validacao VARCHAR(5) DEFAULT 'false',
 titulo TEXT,
 titulo_oficial TEXT
);

ALTER TABLE Obra ADD CONSTRAINT PK_Obra PRIMARY KEY (codigo);


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


CREATE TABLE Adicionado_obra (
 codigo_usuario INT NOT NULL,
 codigo_obra INT NOT NULL,
 data DATETIME NOT NULL
);

ALTER TABLE Adicionado_obra ADD CONSTRAINT PK_Adicionado_obra PRIMARY KEY (codigo_usuario,codigo_obra);


CREATE TABLE Anime (
 codigo INT NOT NULL,
 numero_temporada INT
);

ALTER TABLE Anime ADD CONSTRAINT PK_Anime PRIMARY KEY (codigo);


CREATE TABLE Comentario (
 data DATETIME NOT NULL,
 obra_codigo INT NOT NULL,
 usuario_codigo INT NOT NULL,
 texto TEXT,
 data_update DATETIME
);

ALTER TABLE Comentario ADD CONSTRAINT PK_Comentario PRIMARY KEY (data,obra_codigo,usuario_codigo);


CREATE TABLE Episodio (
 codigo INT NOT NULL,
 codigo_video INT NOT NULL,
 numero_episodio INT NOT NULL,
 lancado DATE,
 data_update DATETIME
);

ALTER TABLE Episodio ADD CONSTRAINT PK_Episodio PRIMARY KEY (codigo);


CREATE TABLE Especificacao (
 codigo_obra INT NOT NULL,
 lancamento DATETIME,
 auto_increment_0 INT,
 trailer INT,
 auto_increment_1 INT,
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
 codigo INT NOT NULL,
 nome VARCHAR(50),
 foto INT
);

ALTER TABLE Perfil ADD CONSTRAINT PK_Perfil PRIMARY KEY (codigo);


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
ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_1 FOREIGN KEY (auto_increment_0) REFERENCES Foto (codigo);
ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_2 FOREIGN KEY (trailer) REFERENCES Video (codigo);
ALTER TABLE Especificacao ADD CONSTRAINT FK_Especificacao_3 FOREIGN KEY (auto_increment_1) REFERENCES Estudio (codigo);


ALTER TABLE ListEpisodio ADD CONSTRAINT FK_ListEpisodio_0 FOREIGN KEY (codigo_episodio) REFERENCES Episodio (codigo);
ALTER TABLE ListEpisodio ADD CONSTRAINT FK_ListEpisodio_1 FOREIGN KEY (codigo_anime) REFERENCES Anime (codigo);


ALTER TABLE ListGenero ADD CONSTRAINT FK_ListGenero_0 FOREIGN KEY (codigo_genero) REFERENCES Genero (codigo);
ALTER TABLE ListGenero ADD CONSTRAINT FK_ListGenero_1 FOREIGN KEY (codigo_obra) REFERENCES Especificacao (codigo_obra);


ALTER TABLE Perfil ADD CONSTRAINT FK_Perfil_0 FOREIGN KEY (codigo) REFERENCES usuario (codigo);
ALTER TABLE Perfil ADD CONSTRAINT FK_Perfil_1 FOREIGN KEY (foto) REFERENCES Foto (codigo);


ALTER TABLE Adicionado_episodio ADD CONSTRAINT FK_Adicionado_episodio_0 FOREIGN KEY (codigo_episodio) REFERENCES Episodio (codigo);
ALTER TABLE Adicionado_episodio ADD CONSTRAINT FK_Adicionado_episodio_1 FOREIGN KEY (codigo_usuario) REFERENCES usuario (codigo);



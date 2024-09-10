CREATE DATABASE construtora;

\c construtora

CREATE TABLE obras (
    id SERIAL PRIMARY KEY,
    nome_projeto VARCHAR(100) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE,
    status VARCHAR(50) NOT NULL,
    descricao TEXT
);

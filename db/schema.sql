CREATE DATABASE language_school CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE language_school;

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    rating DECIMAL(2,1) NOT NULL CHECK (rating >= 0 AND rating <= 5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE exams (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    type ENUM('Selección', 'Pregunta y respuesta', 'Completación') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
SET NAMES 'utf8mb4';

-- Datos de ejemplo
INSERT INTO courses (name, rating) VALUES
('Vocabulario sobre Trabajo en Inglés', 5.0),
('Conversaciones de Trabajo en Inglés', 5.0),
('Gramática Básica', 4.5),
('Pronunciación Avanzada', 4.8);

INSERT INTO exams (name, type) VALUES
('Trabajos y ocupaciones en Inglés', 'Selección'),
('Gramática Nivel 1', 'Completación'),
('Vocabulario General', 'Pregunta y respuesta'),
('Prueba de Pronunciación', 'Selección');
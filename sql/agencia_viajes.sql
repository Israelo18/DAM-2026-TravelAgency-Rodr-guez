create database agencia_viajes;

USE agencia_viajes;

CREATE TABLE viajes (
	id_viaje INT AUTO_INCREMENT PRIMARY KEY,
	titulo VARCHAR(100) NOT NULL,
	descripcion TEXT NOT NULL,
	fecha_inicio DATE NOT NULL,
	fecha_fin DATE NOT NULL,
	precio DECIMAL(10, 2) NOT NULL,
	destacado boolean NOT NULL,
	tipo_de_viaje VARCHAR(50) NOT NULL,
	plazas INT NOT NULL,
	imagen VARCHAR(255) NOT NULL
);

INSERT INTO viajes 
(titulo, descripcion, fecha_inicio, fecha_fin, precio, destacado, tipo_de_viaje, plazas, imagen)
VALUES
(
	"Escapada a París",
	"Disfruta de la ciudad del amor con visitas guiadas y tiempo libre.",
	"2026-03-10",
	"2026-03-15",
	1299.99,
	TRUE,
	"Ciudad",
	25,
	"paris.jpg"
),
(
	"Aventura en la Patagonia",
	"Viaje de aventura con trekking, glaciares y naturaleza salvaje.",
	"2026-01-20",
	"2026-01-30",
	2599.50,
	TRUE,
	"Aventura",
	15,
	"patagonia.jpg"
),
(
	"Relax en Riviera Maya",
	"Todo incluido en resort 5 estrellas frente al mar.",
	"2026-06-05",
	"2026-06-12",
	1899.00,
	FALSE,
	"Playa",
	40,
	"riviera_maya.jpg"
),
(
	"Ruta cultural por Italia",
	"Roma, Florencia y Venecia en un solo viaje.",
	"2026-04-01",
	"2026-04-10",
	2100.00,
	TRUE,
	"Cultural",
	30,
	"italia.jpg"
),
(
	"Safari en Kenia",
	"Observa la fauna africana en su hábitat natural.",
	"2026-07-15",
	"2026-07-25",
	3499.99,
	FALSE,
	"Naturaleza",
	12,
	"kenia.jpg"
),
(
	"Crucero por el Mediterráneo",
	"Recorre Barcelona, Roma y Atenas en un crucero de lujo.",
	"2026-05-10",
	"2026-05-20",
	2799.00,
	TRUE,
	"Crucero",
	60,
	"crucero_mediterraneo.jpg"
),
(
	"Senderismo en los Alpes",
	"Rutas de montaña con paisajes espectaculares y guías expertos.",
	"2026-09-01",
	"2026-09-08",
	1599.75,
	FALSE,
	"Montaña",
	20,
	"alpes.jpg"
),
(
	"Viaje espiritual a la India",
	"Descubre templos, tradiciones y espiritualidad milenaria.",
	"2026-02-05",
	"2026-02-18",
	2999.00,
	TRUE,
	"Espiritual",
	18,
	"india.jpg"
),
(
	"Fin de semana en Londres",
	"Escapada urbana con visitas a museos y zonas emblemáticas.",
	"2026-03-22",
	"2026-03-25",
	899.99,
	FALSE,
	"Ciudad",
	35,
	"londres.jpg"
),
(
	"Islas Canarias al completo",
	"Tour por varias islas con playas, volcanes y gastronomía local.",
	"2026-08-10",
	"2026-08-20",
	1999.50,
	TRUE,
	"Playa",
	45,
	"canarias.jpg"
);

CREATE TABLE producto (
    codpro INT NOT NULL AUTO_INCREMENT,
    nombreprod VARCHAR(50) null,
    descripcion VARCHAR(250) null,
    stock INT NOT NULL,
    imagen VARCHAR(100) null,
    CONSTRAINT pk_producto
    PRIMARY KEY (codpro)
);

INSERT INTO producto (nombreprod, descripcion, stock, imagen)
VALUES ('Xiaomi Mi Electric Scooter Essential', 'Patinete eléctrico motorizado, velocidad máxima de hasta 20km/h,
batería de larga duración de hasta 20km, plegado rápido, panel multifuncional y cuerpo de aluminio aeroespacial, 
E-ABS+ frenos de disco', 10, 'xiaomi-essential.png');
INSERT INTO producto (nombreprod, descripcion, stock, imagen)
VALUES ('Xiaomi Mi Electric Scooter 1S', 'Patinete sólido, de calidad y con buenos materiales, peso de 12,7kg,
velocidad máxima de 25km/h, duración de la batería de 30km, su manillar está pensado para usuarios altos', 10, 'xiaomi-1s.png');
INSERT INTO producto (nombreprod, descripcion, stock, imagen)
VALUES ('Cecotec Bongo Serie S Unlimited', 'Patinete con una velocidad de hasta 25km/h, una autonomía de hasta 45km, 
tiene un gran motor de 350W nominal y 750W de máxima que otorga una fuerza asombrosa, tiene todo el pack completo
para ser considerado el mejor patinete eléctrico', 10, 'cecotec-bongo.png');

CREATE TABLE usuario (
    codusu INT NOT NULL AUTO_INCREMENT,
    nomusu VARCHAR(50) not null,
    passusu varchar(50) not null,
    dni VARCHAR(9) not null,
    email VARCHAR(50) not null,
    CONSTRAINT pk_usuario
    PRIMARY KEY (codusuario)
);

INSERT INTO usuario (nomusu, passusu, dni, email) VALUES ('test', '1234', '53308506A', 'correo@example.com');

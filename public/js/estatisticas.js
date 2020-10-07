var tela = document.querySelector('canvas');
var pincel = tela.getContext('2d');

function desenhaRetangulo(x, y, altura, largura, cor){
    pincel.fillStyle = cor;
    pincel.fillRect(x,y,largura,altura);
    pincel.strokeRect(x,y,largura,altura);
}

function desenhaTexto(texto, x, y){
    pincel.font='15px Georgia';
    pincel.fillStyle='black';
    pincel.fillText(texto, x, y); 
}

function desenhaBarra(x,y,altura,cor,texto,porcentagem){
    desenhaTexto(texto,x,365);
    desenhaRetangulo(x,y,altura,50,cor);
    desenhaTexto(porcentagem+"%",x,y-10);
}

desenhaTexto('Gráfico da situação atual do peso dos pacientes:',50,40);
pincel.fillStyle='white';
pincel.beginPath(); // iniciar a escrita do caminho
pincel.fillRect(50, 50, 500, 300);
pincel.fillStyle='white';
pincel.fillRect(50, 50, 500, 300);
pincel.closePath();

var porc = 10;

for(var i=0; i<10; i++) {
	pincel.beginPath();
	pincel.strokeStyle='#CCCCCC';
	pincel.lineTo(50,350-porc*2.75);
	pincel.lineTo(550,350-porc*2.75);
	pincel.stroke();
	pincel.closePath();
	porc+=10;
}

pincel.strokeStyle='black';

desenhaTexto('%',30,65);

pincel.beginPath();
pincel.strokeStyle='black';
pincel.lineTo(50,350);
pincel.lineTo(50,50);
pincel.stroke();
pincel.closePath();

pincel.beginPath();
pincel.strokeStyle='black';
pincel.lineTo(50,350);
pincel.lineTo(570,350);
pincel.stroke();
pincel.closePath();

pincel.fillStyle = 'black';
pincel.beginPath(); // iniciar a escrita do caminho
pincel.moveTo(50,50); // mover pincel para o ponto inicial do retângulo
pincel.lineTo(45,60); // criar linha até a posição (45,60)
pincel.lineTo(55,60); // criar linha até a posição (55,60)
pincel.fill(); // preencher o triângulo formado pelas linhas
pincel.closePath();

pincel.fillStyle = 'black';
pincel.beginPath();
pincel.moveTo(570,350);
pincel.lineTo(560,345);
pincel.lineTo(560,355);
pincel.fill();
pincel.closePath();

var abaixo = document.querySelector('#abaixo-peso');
var alturaAbaixo = abaixo.textContent;
var porcentagemAbaixo = parseFloat(alturaAbaixo).toFixed(1);
alturaAbaixo *= 2.75;
desenhaBarra(75,350-alturaAbaixo,alturaAbaixo,'lightblue','Abaixo',porcentagemAbaixo);

var normal = document.querySelector('#peso-normal');
var alturaNormal = normal.textContent;
var porcentagemNormal = parseFloat(alturaNormal).toFixed(1);
alturaNormal *= 2.75;
desenhaBarra(175,350-alturaNormal,alturaNormal,'yellowgreen','Normal',porcentagemNormal);

var sobrepeso = document.querySelector('#sobrepeso');
var alturaSobrepeso = sobrepeso.textContent;
var porcentagemSobrepeso = parseFloat(alturaSobrepeso).toFixed(1);
alturaSobrepeso *= 2.75;
desenhaBarra(275,350-alturaSobrepeso,alturaSobrepeso,'gold','Sobrepeso',porcentagemSobrepeso);

var obesidade = document.querySelector('#obesidade');
var alturaObesidade = obesidade.textContent;
var porcentagemObesidade = parseFloat(alturaObesidade).toFixed(1);
alturaObesidade *= 2.75;
desenhaBarra(375,350-alturaObesidade,alturaObesidade,'orange','Obesos',porcentagemObesidade);

var morbida = document.querySelector('#morbida');
var alturaMorbida = morbida.textContent;
var porcentagemMorbida = parseFloat(alturaMorbida).toFixed(1);
alturaMorbida *= 2.75;
desenhaBarra(475,350-alturaMorbida,alturaMorbida,'coral','Mórbida',porcentagemMorbida);


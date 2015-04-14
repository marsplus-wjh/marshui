// type/paste following clauses in node command console and check the result of output

var matrix=[[1,1,1,1],[0,0,0,0],[0,0,0,0],[0,0,0,0]];

var matrix=[[0,1,2,3],[4,5,6,7],[8,9,10,11],[12,13,14,15]];

matrix
matrix[1]
matrix[1][1]
var rotatedMatrix=[[0,0,0,0],[0,0,0,0],[0,0,0,0],[0,0,0,0]];//vacant matrix
rotatedMatrix
for (var x=0; x<4;x++){ for (var y=0;y<4;y++) { rotatedMatrix[x][y] = matrix[y][x]; } }
rotatedMatrix
for (var x=0; x<4;x++){ for (var y=0;y<4;y++) { rotatedMatrix[x][y] = matrix[3-y][3-x]; } }//逆序
rotatedMatrix
for (var x=0; x<4;x++){ for (var y=0;y<4;y++) { rotatedMatrix[x][y] = matrix[3-x][3-y]; } }
rotatedMatrix
for (var x=0; x<4;x++){ for (var y=0;y<4;y++) {rotatedMatrix[x][y] = matrix[3-y][x]}}
console.log("Clockwise")
console.log(rotatedMatrix)
//Clockwise(顺时针) 90 degree 
// TODO: finish a AntiClockwise(逆时针) 90 degree matrix calculation
rotatedMatrix
for (var x=0; x<4;x++){ for (var y=0;y<4;y++) {rotatedMatrix[x][y] = matrix[y][3-x]}}
console.log("AntiClockwise")
console.log(rotatedMatrix)
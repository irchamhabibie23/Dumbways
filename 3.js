const input =  ['d','u','m','b','w','a','y','s','i','d']
const container = ['=','=','=','=','=','=','=','=','=','=']
for (i = 0 ; i<input.length ; i++){
    container[i]=input[i]
    container[container.length-(i+1)]=input[i]
    console.log(container.join(' '))
    container[i]='='
    container[container.length-(i+1)]='='
}

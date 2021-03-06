function matrix(n) {
    var i;
    var j;
    
    for (i=0; i < n; i++){
        var kocam=[];
        for (j=0; j < n; j++){
            a=[]
            if (i === j)
            {
                a.push(1);
            }else{
             a.push(0);
            }
        }
        kocam.push(a);
    }
    console.log(kocam)
}
    
matrix(4);
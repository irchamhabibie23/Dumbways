function buyEgg(tanggal, uang){
    telur = 2500
    jmlTelur = uang / telur
    if (cekPrime(tanggal)){
        bonus = (jmlTelur / 12)*2
        jmlTelur += bonus
    }
    if (tanggal % 2 == 1 && !cekPrime(tanggal)){
        bonus = (jmlTelur / 12)*3
        if (tanggal % 5 ==0 && bonus %2 == 1){
        bonus = bonus * 5
        }
        if (tanggal % 5 ==0 && bonus %2 == 0){
            bonus = bonus * 10
            }
        jmlTelur += bonus
    }
    return jmlTelur
}

function cekPrime(a){
    if (a === 1) {
        return false;
    }
    if (a == 2){
        return true
    }else{
        for (i=2 ; i<(a/2)+1 ;){
            if (a % i != 0){
                i++
                continue
            }return false
        }
        return true
    }
}

console.log(buyEgg(13, 60000))
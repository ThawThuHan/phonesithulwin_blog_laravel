const count = document.getElementById("count");
let value;

function updateVisitCount() {
    fetch("https://api.countapi.xyz/update/dardar/instagram/?amount=1")
        .then(res => res.json())
        .then(data => {
            value = 10000 + data.value;

            if(value > 99999){
                value = Math.floor(value/1000000);
                count.innerHTML = `${value} millions+`;
            } else if(value > 999){
                value = Math.floor(value/1000);
                count.innerHTML = `${value} k+`;
            }else {
                count.innerHTML = value;
            }   
        })
}

updateVisitCount();
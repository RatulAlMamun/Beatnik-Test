function seatGenerator (seatno, id) {
    let rowResult= '';
    let numberOfSeat = seatno;
    let lastSeatName = String.fromCharCode(parseInt((numberOfSeat-3)/4) + 64)
    let lastSeatNumber = 0;
    let rowStart =`
        <div class="row">
        <div class="col-12">
    `;
    let rowEnd =`
        </div>
        </div>
    `;

    for(let i = 1; i <= numberOfSeat; i++) {
        if(i >= 1 && i <= 3) {
            if(i == 1) {
                rowResult += rowStart;
                rowResult += '<div class="mx-auto w-75 extraSeat">';
                rowResult += `<button type="button" class="btn btn-outline-success m-1 seatbutton">Ex${i}</button>`;
                rowResult += '<button type="button" class="btn m-1 seatbutton" disabled></button>';
                rowResult += '<button type="button" class="btn m-1 seatbutton" disabled></button>';
            }
            
            if(i == 2 || i == 3) {
                rowResult += `<button type="button" class="btn btn-outline-success m-1 seatbutton">Ex${i}</button>`;
            }

            if(i == 3) {
                rowResult += '</div>';
                rowResult += rowEnd;
            }
        } else if(i >=4 && i <= numberOfSeat - 5) {
            if(i % 4 == 0) {
                rowResult += rowStart;
                rowResult += '<div class="mx-auto w-75">';
            }
            if(i % 2 == 0 && i % 4 != 0) {
                rowResult += '<button type="button" class="btn m-1 seatbutton" disabled></button>';
            }
            rowResult += `<button type="button" class="btn btn-outline-success m-1 seatbutton">${String.fromCharCode(parseInt(i/4) + 64)}${i%4+1}</button>`;
            if ((i + 1) % 4 == 0) {
                rowResult += '</div>';
                rowResult += rowEnd;
            }
        } else {
            if (i == numberOfSeat - 4) {
                rowResult += rowStart;
                rowResult += '<div class="mx-auto w-75">';
            }
            rowResult += `<button type="button" class="btn btn-outline-success m-1 seatbutton">${lastSeatName}${++lastSeatNumber}</button>`;
            if (i == numberOfSeat) {
                rowResult += '</div>';
                rowResult += rowEnd;
            }
        }
    }

    document.getElementById(id).innerHTML = rowResult;
}

seatGenerator(44, 'seatPlan');
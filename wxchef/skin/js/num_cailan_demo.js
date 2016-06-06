/** 总份数*/
var fens = document.getElementById("fen");
var fen = parseFloat(fens.innerHTML);
//底部购物车
var bottomCart = document.getElementsByClassName('bottomCart')[0];
/** 总价格 */
var allmoney = document.getElementById("allmoney");
var paymoney = parseFloat(allmoney.innerHTML);
//服务费
var fee = document.getElementById('fee');
var ff = document.getElementsByClassName('ff')[0];
var servmoeny = document.getElementById("servmoney");
var fwf;
//服务条款
var fwftip = document.getElementsByClassName('fwftip')[0];
//当前输入框的值
var curCount;
var onum = 0;
//加载完成统计份数和总价
window.onload = function() {
    var ordFen = document.getElementsByClassName('numTxt');
    var ordPrice = document.getElementsByClassName('price');
    fen = 0;
    paymoney = 0;
    for (var i = 0; i < ordFen.length; i++) {
        fen += parseInt(ordFen[i].value);
        paymoney += parseFloat(parseInt(ordFen[i].value) * parseFloat(ordPrice[i].innerHTML));
    }

    fens.innerHTML = fen;
    if (fen > 0) {
        fwftip.style.display = "block";
    } else {
        fwftip.style.display = "none";
    }

    servFee(paymoney);
    allmoney.innerHTML = (paymoney + fwf).toFixed(2);
}

//键盘松开时 限制非数值型输入
function IsNum(e) {
    var k = window.event ? e.keyCode : e.which;
    if (((k >= 48) && (k <= 57)) || k == 8 || k == 0) {} else {
        if (window.event) {
            window.event.returnValue = false;
        } else {
            e.preventDefault(); //for firefox 
        }
    }
}
//每次输入时获取当前的值
function keydown(t) {
    if (event.keyCode == 13)
        event.keyCode = 9;
    else
        onum = t.value;
}
//同步输入 验证+数量总价显示
function ueserWrite(obj) {
    console.log(obj.value);
    curCount = obj.value;
    if (!/^[0-9]*[1-9][0-9]*$/.test(obj.value) || obj.value == '' || obj.value >= 200) {
        alert("请输入大于0小于200的整数哟！");
        obj.focus();
        obj.value = onum;
        return false;
    }
    var prices = obj.parentNode.parentNode.getElementsByClassName("price")[0].innerHTML;
    fen += obj.value - onum;
    fens.innerHTML = fen;
    paymoney += (obj.value - onum) * prices;
    servFee(paymoney);
    allmoney.innerHTML = (paymoney + fwf).toFixed(2);

}

//加减操作
function handle(self, isAdd) {
    var countEl = self.parentNode.childNodes[3];
    curCount = parseFloat(countEl.value);

    var reduce = self.parentNode.childNodes[1];
    var price = self.parentNode.parentNode.getElementsByClassName("price")[0].innerHTML; /* 获取价格 */
    var foodId = self.parentNode.parentNode.childNodes[1].value;

    if (isAdd) {
        curCount++;
        console.log(curCount);
        fen++;
        reduce.style.display = "inline-block";
        countEl.style.display = "inline-block";
        paymoney += parseFloat(price);

        fens.innerHTML = fen;
        countEl.value = curCount;
        allmoney.innerHTML = paymoney.toFixed(2);

        addcart()
            // prabola();
    } else {
        curCount--;
        console.log(curCount);
        fen--;
        if (curCount < 1) {
            curCount = 0;
            paymoney = paymoney - parseFloat(price) * 1;
            reduce.style.display = "none";
            countEl.style.display = "none";

        } else {
            paymoney -= parseFloat(price);
        }


    }
    servFee(paymoney);
    fens.innerHTML = fen;


    countEl.value = curCount;
    allmoney.innerHTML = (paymoney + fwf).toFixed(2);
    if (fen > 0) {
        fwftip.style.display = "block";
    } else {
        fwftip.style.display = "none";
    }
}

//底部购物车加减操作
function deal(self, isAdd) {
    var number = self.parentNode.childNodes[3];
    curnum = parseInt(number.innerHTML);
    console.log(curnum);
    var reduce = self.parentNode.childNodes[1];
    var priceh = parseFloat(self.parentNode.parentNode.getElementsByClassName("priceh")[0].value); /* 获取价格 */
    var et = self.parentNode.parentNode.getElementsByClassName("everyTotal")[0];
    console.log(priceh);
    var everyTotal = parseFloat(et.innerHTML);
    //  var foodId = self.parentNode.parentNode.childNodes[1].value;

    if (isAdd) {
        curnum++;
        console.log(curnum);
        fen++;
        paymoney += priceh;
        everyTotal += priceh;
        fens.innerHTML = fen;
        number.innerHTML = curnum;
        et.innerHTML = everyTotal;
    } else {
        curnum--;
        console.log(curnum);
        fen--;
        if (curnum < 1) {
            curnum = 0;
            paymoney = paymoney - parseFloat(priceh) * 1;
            everyTotal = 0;
            var curli = self.parentNode.parentNode;
            self.parentNode.parentNode.parentNode.removeChild(curli);

        } else {
            paymoney -= parseFloat(priceh);
            everyTotal -= parseFloat(priceh);
        }
        et.innerHTML = everyTotal;
        number.innerHTML = curnum;
    }
    servFee(paymoney);
    fens.innerHTML = fen;


    allmoney.innerHTML = (paymoney + fwf).toFixed(2);
    if (fen > 0) {
        fwftip.style.display = "block";
    } else {
        fwftip.style.display = "none";
        bottomCart.style.display = "none";
    }
}


//计算服务费

function servFee(feeT) {
    if (feeT > 300 || feeT <= 0) {
        fwf = 0;
        ff.style.display = 'none';
        servmoeny.innerHTML = fwf;
        fee.value = fwf;
    }

    if (feeT > 0 && feeT <= 240) {
        fwf = 60.00;
        ff.style.display = '';
        servmoeny.innerHTML = fwf.toFixed(2);
        fee.value = fwf.toFixed(2);
    }
    if (feeT > 240 && feeT <= 300) {
        fwf = 300 - feeT;
        ff.style.display = '';
        servmoeny.innerHTML = fwf.toFixed(2);
        fee.value = fwf.toFixed(2);
    }

    console.log(fee.value);
}

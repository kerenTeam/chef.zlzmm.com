 //是否选择服务员

 var sercheck = document.getElementById('serpeople');
 var cd = document.getElementsByClassName('cd')[0];
 var serinput = document.getElementsByClassName('serinput')[0];
 var serprice = document.getElementById('serprice');
 var servTotal1 = document.getElementById('servTotal');
 var allmoney = document.getElementById('allmoney');
 var keep = allmoney.innerHTML;
 sercheck.onclick = function() {

         if (sercheck.checked) {
             cd.style.display = "";
             serinput.value = 1;
             allmoney.innerHTML = (parseFloat(allmoney.innerHTML) + parseFloat(serprice.innerHTML)).toFixed(2);
         } else {

             cd.style.display = "none";
             serinput.value = 0;
             allmoney.innerHTML = (parseFloat(allmoney.innerHTML) - parseFloat(servTotal1.value)).toFixed(2);
         }
         servTotal1.value = parseInt(serinput.value) * parseInt(serprice.innerHTML);
         //allmoney.innerHTML = parseFloat(allmoney.innerHTML)+parseFloat(servTotal.value);
     }
     //服务于数量加减
 function empdel() {
     var sernum = serinput.value;
     sernum--;
     if (sernum < 1) {
         sernum = 0;
         sercheck.checked = false;
         cd.style.display = "none";
     }
     serinput.value = sernum;
     servTotal1.value = sernum * parseFloat(serprice.innerHTML);
     console.log(servTotal.value);
     allmoney.innerHTML = (parseFloat(allmoney.innerHTML) - parseFloat(serprice.innerHTML)).toFixed(2);
 }

 function empladd() {
     var sernum = serinput.value;
     sernum++;
     serinput.value = sernum;
     servTotal1.value = sernum * parseFloat(serprice.innerHTML);
     console.log(servTotal.value);
     allmoney.innerHTML = (parseFloat(allmoney.innerHTML) + parseFloat(serprice.innerHTML)).toFixed(2);
 }

 var sercheck2 = document.getElementById('serpeople2');
 var cd2 = document.getElementsByClassName('cd2')[0];
 var serinput2 = document.getElementsByClassName('serinput2')[0];
 var serprice2 = document.getElementById('serprice2');
 var servTotal2 = document.getElementById('servTotal2');
 sercheck2.onclick = function() {

         if (sercheck2.checked) {
             cd2.style.display = "";
             serinput2.value = 1;
             allmoney.innerHTML = (parseFloat(allmoney.innerHTML) + parseFloat(serprice2.innerHTML)).toFixed(2);
         } else {
             cd2.style.display = "none";
             serinput2.value = 0;
             allmoney.innerHTML = (parseFloat(allmoney.innerHTML) - parseFloat(servTotal2.value)).toFixed(2);
         }
         servTotal2.value = (serinput2.value) * parseInt(serprice2.innerHTML);
         //allmoney.innerHTML = parseFloat(allmoney.innerHTML)+parseFloat(servTotal.value);
     }
     //服务于数量加减
 function empdel2() {
     var sernum2 = serinput2.value;
     sernum2--;
     if (sernum2 < 1) {
         sernum2 = 0;
         sercheck2.checked = false;
         cd2.style.display = "none";
     }
     serinput2.value = sernum2;
     servTotal2.value = sernum2 * parseFloat(serprice2.innerHTML);
     console.log(servTotal2.value);
     allmoney.innerHTML = (parseFloat(allmoney.innerHTML) - parseFloat(serprice2.innerHTML)).toFixed(2);
 }

 function empladd2() {
     var sernum2 = serinput2.value;
     sernum2++;
     serinput2.value = sernum2;
     servTotal2.value = sernum2 * parseFloat(serprice2.innerHTML);
     console.log(servTotal2.value);
     allmoney.innerHTML = (parseFloat(allmoney.innerHTML) + parseFloat(serprice2.innerHTML)).toFixed(2);
 }

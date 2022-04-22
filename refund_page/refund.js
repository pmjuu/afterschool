function refundRegister() {

  var td_newName = document.createElement("td"); //이름
  var name = document.querySelector("#name");
  var newName = document.createTextNode(name.value);
  td_newName.appendChild(newName);

  var td_newProgram = document.createElement("td"); //부서명
  var program = document.querySelector("#program");
  var newProgram = document.createTextNode(program.value);
  td_newProgram.appendChild(newProgram);

  const programList = ["독서논술토론", "창의미술", "비즈토탈공예", "컴퓨터", "수학", "영어회화", "피아노", "바이올린", "로봇과학", "음악줄넘기", "요리", "창의실험과학", "농구", "방송댄스", "바둑체스", "축구", "창의생명과학"];
  const fee1List = [
    3750,
    3800,
    3750,
    3125,
    3750,
    3750,
    3800,
    3750,
    3125,
    3750,
    3500,
    3750,
    3750,
    3750,
    3750,
    3750,
    3125];

  var fee1 = 0;
  for (var i = 0; i < programList.length; i++)
    if (program.value == programList[i])
      fee1 = fee1List[i];

  var td_newFee1 = document.createElement("td"); //차시별 강사료
  var newFee1 = document.createTextNode(fee1);
  td_newFee1.appendChild(newFee1);

  var fee2 = 150;
  var td_newFee2 = document.createElement("td"); //차시별 수용비
  var newFee2 = document.createTextNode(fee2);
  td_newFee2.appendChild(newFee2);

  var td_newTime = document.createElement("td"); //환불 차시
  var classTime = document.querySelector("#classTime");
  var newTime = document.createTextNode(classTime.value);
  td_newTime.appendChild(newTime);
  
  var td_newMcost = document.createElement("td"); //재료비: Material cost
  var mcost = document.querySelector("#mcost");
  var newMcost = document.createTextNode(mcost.value);
  td_newMcost.appendChild(newMcost);

  var td_newRefund = document.createElement("td"); //환불 금액
  var newRefund = document.createTextNode((fee1 + fee2) * classTime.value + mcost.value);
  td_newRefund.appendChild(newRefund);

  var td_newDate = document.createElement("td"); //환불 요구 기간
  var refund_date1 = document.querySelector("#refund_date1");
  var refund_date2 = document.querySelector("#refund_date2");
  var refund_dateTotal = refund_date1.value + " ~ " + refund_date2.value
  var newDate = document.createTextNode(refund_dateTotal);
  td_newDate.appendChild(newDate);

  var td_newMemo = document.createElement("td"); //비고
  var memo = document.querySelector("#memo");
  var newMemo = document.createTextNode(memo.value);
  td_newMemo.appendChild(newMemo);

  var newRow = document.createElement("tr");
  newRow.appendChild(td_newName);
  newRow.appendChild(td_newProgram);
  newRow.appendChild(td_newFee1);
  newRow.appendChild(td_newFee2);
  newRow.appendChild(td_newTime);
  newRow.appendChild(td_newMcost);
  newRow.appendChild(td_newRefund);
  newRow.appendChild(td_newDate);
  newRow.appendChild(td_newMemo);

  var refundTable = document.querySelector("#refundTable");
  refundTable.appendChild(newRow);

  name.value="";
  mcost.value="";
  memo.value="";
}

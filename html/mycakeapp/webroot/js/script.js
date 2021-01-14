'use strict';

if (obj["finished"] === true) {
  document.getElementById('finished').textContent = '終了しました';
} else {

  //パラメータとしてゴール時間が設定されたDateオブジェクトを受け取り、パラメータdueに代入する
  const countdown = (due) => {
    //現在の時間を取得
    const request = new XMLHttpRequest;
    request.open('GET', '#', false);
    request.send(null);
    const now = new Date(request.getResponseHeader('Date'));

    const rest = due.getTime() - now.getTime();
    const sec = Math.floor(rest / 1000) % 60;
    const min = Math.floor(rest / 1000 / 60) % 60;
    const hours = Math.floor(rest / 1000 / 60 / 60) % 24;
    const days = Math.floor(rest / 1000 / 60 / 60 / 24);
    const count = [days, hours, min, sec];

    return count;
  }

  //PHP側で記述した変数 const obj = { $biditem };を使う
  //JSON形式で配列から終了時間を取り出す
  const time = JSON.stringify(obj["endtime"]);

  //年、月、日、時、分ごとに切り取る
  const year = time.substring(1, 5);
  const month = (Number(time.substring(6, 8))) - 1;
  const date = Number(time.substring(9, 11));
  const hours = Number(time.substring(12, 14));
  const minutes = Number(time.substring(15, 17));

  //Dateオブジェクトに切り取った値を代入を設定 秒は０で固定
  const goal = new Date();
  goal.setFullYear(year);
  goal.setMonth(month);
  goal.setDate(date);
  goal.setHours(hours);
  goal.setMinutes(minutes);
  goal.setSeconds(0);

  function recalc() {

    const counter = countdown(goal);
    document.getElementById('day').textContent = counter[0];
    document.getElementById('hour').textContent = counter[1];
    document.getElementById('min').textContent = String(counter[2]).padStart(2, '0');
    document.getElementById('sec').textContent = String(counter[3]).padStart(2, '0');
    refresh();
  }

  function refresh() {
    setTimeout(recalc, 400);
  }

  recalc();

}

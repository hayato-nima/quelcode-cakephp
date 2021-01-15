'use strict';

if (biditem["finished"] === true) {
  document.getElementById('finished').textContent = '終了しました';
} else {
  //PHP側で記述した変数 const obj = { $biditem };を使う
  //JSON形式で配列から終了時間を取り出す
  const endtime = JSON.stringify(biditem["endtime"]);

  //年、月、日、時、分ごとに切り取る
  const year = endtime.substring(1, 5);
  const month = (Number(endtime.substring(6, 8))) - 1;
  const date = Number(endtime.substring(9, 11));
  const hours = Number(endtime.substring(12, 14));
  const minutes = Number(endtime.substring(15, 17));

  //Dateオブジェクトに切り取った値を代入を設定
  const goal = new Date();
  goal.setFullYear(year);
  goal.setMonth(month);
  goal.setDate(date);
  goal.setHours(hours);
  goal.setMinutes(minutes);
  goal.setSeconds(0);//秒は0で固定

  //パラメータとしてゴール時間が設定されたDateオブジェクトを受け取り、パラメータdueに代入する
  const countdown = (due) => {
    //オークションの終了時間 - サーバーの現在時間
    const rest = due.getTime() - (serverCurrentTimestamp * 1000);
    //restを日、時、分、秒に加工
    const sec = Math.floor(rest / 1000) % 60;
    const min = Math.floor(rest / 1000 / 60) % 60;
    const hours = Math.floor(rest / 1000 / 60 / 60) % 24;
    const days = Math.floor(rest / 1000 / 60 / 60 / 24);
    const count = { days, hours, min, sec, rest };
    //1回のループごとに１を足す
    serverCurrentTimestamp++;
    return count;
  };

  const recalc = () => {
    //ここにはJSのオブジェクトが入る
    const counter = countdown(goal);
    //残り時間がある時は残り時間を表示する
    if ((Math.floor(counter.rest / 1000)) > 0) {
      document.getElementById('day').textContent = counter.days;
      document.getElementById('hour').textContent = counter.hours;
      document.getElementById('min').textContent = String(counter.min).padStart(2, '0');
      document.getElementById('sec').textContent = String(counter.sec).padStart(2, '0');
    }else{
      //残り時間がなくなった時に終了表示をする
      document.getElementById('finished').textContent = '終了しました';
    }
    refresh();

  };

  const refresh = () => {
    setTimeout(recalc, 1000);
  };

  recalc();

}

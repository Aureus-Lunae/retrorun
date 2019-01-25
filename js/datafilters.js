console.log(`start script`);

const GetDataFromDatabase = (url, output) => {
  console.log('Start function');
  let genre = document.getElementById(`genre`).value;
  let consoles = document.getElementById(`console`).value;
  let publisher = document.getElementById(`publisher`).value;
  console.log(`genre:${genre} console:${consoles} publisher${publisher}`);
  let multiplayerMin = document.getElementById(`min_players`).value;
  let multiplayerMax = document.getElementById(`max_players`).value;
  let sort = document.getElementById(`sort`).value;
  let compiled_url =
    `${url}?genre=${genre}&console=${consoles}&publisher=${publisher}&min_players=${multiplayerMin}&max_players=${multiplayerMax}&sort=${sort}`;
  console.log(compiled_url);

  let xmlRequest = new XMLHttpRequest();
  xmlRequest.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      output(this);
    }
  };
  xmlRequest.open(`GET`, compiled_url, true);
  xmlRequest.send();
}

const showData = (data) => {
  let filterResults = document.getElementById(`game_filters_output`);
  filterResults.innerHTML = data[`response`];
}
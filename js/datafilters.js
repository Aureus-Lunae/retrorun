console.log(`start script`);

const GetDataFromDatabase = (url, output) => {
  let genre = document.getElementById(`genre`).value;
  let consoles = document.getElementById(`console`).value;
  let publisher = document.getElementById(`publisher`).value;
  let multiplayerMin = document.getElementById(`min_players`).value;
  let multiplayerMax = document.getElementById(`max_players`).value;
  let sort = document.getElementById(`sort`).value;
  let compiledUrl =
    `${url}?genre=${genre}&console=${consoles}&publisher=${publisher}&min_players=${multiplayerMin}&max_players=${multiplayerMax}&sort=${sort}`;
  UpdatePage(compiledUrl, output);
}

const UpdatePage = (url, output) => {
  console.log('update start');
  console.log(url);
  let xmlRequest = new XMLHttpRequest();
  xmlRequest.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this);
      output(this);
    }
  };
  xmlRequest.open(`GET`, url, true);
  xmlRequest.send();
}

const GetDataFromSearch = (url, output) => {
  console.log(url);
  let sort = '';
  let checkGame = url.includes(`gamesearchsort.php`)
  if (checkGame) {
    sort = document.getElementById(`sortGame`).value;
  }
  let compiledUrl =
    `${url}&sort=${sort}`;
  UpdatePage(compiledUrl, output);
}

const showData = (data) => {
  let filterResults = document.getElementById(`game_filters_output`);
  filterResults.innerHTML = data[`response`];
}

const showDataConsole = (data) => {
  let filterResults = document.getElementById(`console_filters_output`);
  filterResults.innerHTML = data[`response`];
}
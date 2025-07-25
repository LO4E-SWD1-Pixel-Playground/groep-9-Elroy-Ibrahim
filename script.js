function vrienden() {
  console.log(1);

  let vriendbox = (document.querySelectorAll(".gebruikersnaam").checked = true);
  let gebruikercount = 1;
  for (
    let classcount = 0;
    classcount < document.querySelectorAll(".gebruikersnaam").length;
    classcount++
  ) {
    if (
      document.querySelector(".gebruiker" + gebruikercount).checked === true
    ) {
      let denaamv = document.querySelector(".gebruiker" + gebruikercount).value;
      document.getElementById("denaam").value = denaamv;
      console.log(document.querySelector(".gebruiker" + gebruikercount).value);
      document.getElementById("verstuurverzoek").click();
    }
    gebruikercount++;
  }
}
function vriendverwijderen() {
  let verwijderen = (document.querySelectorAll(".verwijderen").checked = true);
  let vriendverwijdercount = 1;
  for (
    let verwijderencount = 0;
    verwijderencount < document.querySelectorAll(".verwijderen").length;
    verwijderencount++
  ) {
    if (
      document.querySelector(".vriend" + vriendverwijdercount).checked == true
    ) {
      let wegvriend = document.querySelector(
        ".vriend" + vriendverwijdercount
      ).value;
      let weg = document.getElementById(
        "vriendverwijderenh" + vriendverwijdercount + ""
      ).value;

      if (confirm("Weet je zeker dat " + weg + " wil ontvrienden.")) {
        document.getElementById("vriendenverwijderen").value = wegvriend;
        document.getElementById("autoclick").click();
      } else {
        document.getElementById("vriendenverwijderen").value = "";
      }

      console.log(
        document.getElementById(".vriend" + vriendverwijdercount).innerHTML
      );
      let verwijderencount = verwijderen.length;
    }
    vriendverwijdercount++;
  }

  let uncheck = 1;
  let unchecked = 0;
  while (unchecked < document.querySelectorAll(".verwijderen").length) {
    document.querySelector(".vriend" + uncheck).checked = false;
    unchecked++;
    uncheck++;
  }
}

const allCells = document.querySelectorAll(".cells:not(.row-top)");
const topCellse = document.querySelectorAll(".cells.row-top");
const resetButton = document.querySelector(".reset");
const statusSpan = document.querySelector(".status");
let you = document.getElementById("you").value;
let playerone = 0;
let playertwo = 0;
const column0 = [
  allCells[35],
  allCells[28],
  allCells[21],
  allCells[14],
  allCells[7],
  allCells[0],
  topCellse[0],
];
const column1 = [
  allCells[36],
  allCells[29],
  allCells[22],
  allCells[15],
  allCells[8],
  allCells[1],
  topCellse[1],
];
const column2 = [
  allCells[37],
  allCells[30],
  allCells[23],
  allCells[16],
  allCells[9],
  allCells[2],
  topCellse[2],
];
const column3 = [
  allCells[38],
  allCells[31],
  allCells[24],
  allCells[17],
  allCells[10],
  allCells[3],
  topCellse[3],
];
const column4 = [
  allCells[39],
  allCells[32],
  allCells[25],
  allCells[18],
  allCells[11],
  allCells[4],
  topCellse[4],
];
const column5 = [
  allCells[40],
  allCells[33],
  allCells[26],
  allCells[19],
  allCells[12],
  allCells[5],
  topCellse[5],
];
const column6 = [
  allCells[41],
  allCells[34],
  allCells[27],
  allCells[20],
  allCells[13],
  allCells[6],
  topCellse[6],
];
const columns = [column0, column1, column2, column3, column4, column5, column6];

const topRow = [
  topCellse[0],
  topCellse[1],
  topCellse[2],
  topCellse[3],
  topCellse[4],
  topCellse[5],
  topCellse[6],
];
const row0 = [
  allCells[0],
  allCells[1],
  allCells[2],
  allCells[3],
  allCells[4],
  allCells[5],
  allCells[6],
];
const row1 = [
  allCells[7],
  allCells[8],
  allCells[9],
  allCells[10],
  allCells[11],
  allCells[12],
  allCells[13],
];
const row2 = [
  allCells[14],
  allCells[15],
  allCells[16],
  allCells[17],
  allCells[18],
  allCells[19],
  allCells[20],
];
const row3 = [
  allCells[21],
  allCells[22],
  allCells[23],
  allCells[24],
  allCells[25],
  allCells[26],
  allCells[27],
];
const row4 = [
  allCells[28],
  allCells[29],
  allCells[30],
  allCells[31],
  allCells[32],
  allCells[33],
  allCells[34],
];
const row5 = [
  allCells[35],
  allCells[36],
  allCells[37],
  allCells[38],
  allCells[39],
  allCells[40],
  allCells[41],
];
const rows = [row0, row1, row2, row3, row4, row5, topRow];

let gameIsLive = true;
let yellowIsNext = true;

const getClassListArray = (cell) => {
  const classList = cell.classList;
  return [...classList];
};

const getCellLocation = (cell) => {
  const classList = getClassListArray(cell);

  const rowClass = classList.find((className) => className.includes("row"));
  const colClass = classList.find((className) => className.includes("col"));
  const rowIndex = rowClass[4];
  const colIndex = colClass[4];
  const rowNumber = parseInt(rowIndex, 10);
  const colNumber = parseInt(colIndex, 10);

  return [rowNumber, colNumber];
};

const getFirstOpenCellForColumn = (colIndex) => {
  const column = columns[colIndex];
  const columnWithoutTop = column.slice(0, 6);
  for (const cell of columnWithoutTop) {
    const classList = getClassListArray(cell);
    if (!classList.includes("yellow") && !classList.includes("red")) {
      return cell;
    }
  }

  return null;
};

const clearColorFromTop = (colIndex) => {
  const topCells = topCellse[colIndex];
  topCells.classList.remove("yellow");
  topCells.classList.remove("red");
};

const getColorOfCells = (cell) => {
  const classList = getClassListArray(cell);
  if (classList.includes("yellow")) return "yellow";
  if (classList.includes("red")) return "red";
  return null;
};

const checkWinningCells = (cells) => {
  if (cells.length < 4) return false;
  gameIsLive = false;
  resetButton.disabled = false;
  for (const cell of cells) {
    cell.classList.add("win");
  }
  let otherplayer = document.getElementById("otherplayer").value;
  statusSpan.textContent = `${yellowIsNext ? otherplayer : you} has won`;
  if (yellowIsNext === true) {
    playertwo++;
  } else {
    playerone++;
  }
  document.querySelector(".score").innerHTML =
    " score:<br><br>" +
    you +
    " - " +
    playerone +
    "<br><br>" +
    otherplayer +
    " - " +
    playertwo;
  return true;
};
const checkStatusOfGame = (cell) => {
  const color = getColorOfCells(cell);
  if (!color) return;
  const [rowIndex, colIndex] = getCellLocation(cell);
  let winningCells = [cell];
  let rowToCheck = rowIndex;
  let colToCheck = colIndex - 1;
  while (colToCheck >= 0) {
    const cellToCheck = rows[rowToCheck][colToCheck];
    if (getColorOfCells(cellToCheck) === color) {
      winningCells.push(cellToCheck);
      colToCheck--;
    } else {
      break;
    }
  }

  colToCheck = colIndex + 1;
  while (colToCheck <= 6) {
    const cellToCheck = rows[rowToCheck][colToCheck];
    if (getColorOfCells(cellToCheck) === color) {
      winningCells.push(cellToCheck);
      colToCheck++;
    } else {
      break;
    }
  }
  let isWinningCombo = checkWinningCells(winningCells);
  if (isWinningCombo) return;

  winningCells = [cell];
  rowToCheck = rowIndex - 1;
  colToCheck = colIndex;
  while (rowToCheck >= 0) {
    const cellToCheck = rows[rowToCheck][colToCheck];
    if (getColorOfCells(cellToCheck) === color) {
      winningCells.push(cellToCheck);
      rowToCheck--;
    } else {
      break;
    }
  }

  rowToCheck = rowIndex + 1;
  while (rowToCheck <= 5) {
    const cellToCheck = rows[rowToCheck][colToCheck];
    if (getColorOfCells(cellToCheck) === color) {
      winningCells.push(cellToCheck);
      rowToCheck++;
    } else {
      break;
    }
  }
  isWinningCombo = checkWinningCells(winningCells);
  if (isWinningCombo) return;
  winningCells = [cell];
  rowToCheck = rowIndex + 1;
  colToCheck = colIndex - 1;
  while (colToCheck >= 0 && rowToCheck <= 5) {
    const cellToCheck = rows[rowToCheck][colToCheck];
    if (getColorOfCells(cellToCheck) === color) {
      winningCells.push(cellToCheck);
      rowToCheck++;
      colToCheck--;
    } else {
      break;
    }
  }
  rowToCheck = rowIndex - 1;
  colToCheck = colIndex + 1;
  while (colToCheck <= 6 && rowToCheck >= 0) {
    const cellToCheck = rows[rowToCheck][colToCheck];
    if (getColorOfCells(cellToCheck) === color) {
      winningCells.push(cellToCheck);
      rowToCheck--;
      colToCheck++;
    } else {
      break;
    }
  }
  isWinningCombo = checkWinningCells(winningCells);
  if (isWinningCombo) return;
  winningCells = [cell];
  rowToCheck = rowIndex - 1;
  colToCheck = colIndex - 1;
  while (colToCheck >= 0 && rowToCheck >= 0) {
    const cellToCheck = rows[rowToCheck][colToCheck];
    if (getColorOfCells(cellToCheck) === color) {
      winningCells.push(cellToCheck);
      rowToCheck--;
      colToCheck--;
    } else {
      break;
    }
  }
  rowToCheck = rowIndex + 1;
  colToCheck = colIndex + 1;
  while (colToCheck <= 6 && rowToCheck <= 5) {
    const cellToCheck = rows[rowToCheck][colToCheck];
    if (getColorOfCells(cellToCheck) === color) {
      winningCells.push(cellToCheck);
      rowToCheck++;
      colToCheck++;
    } else {
      break;
    }
  }
  isWinningCombo = checkWinningCells(winningCells);
  if (isWinningCombo) return;

  const rowsWithoutTop = rows.slice(0, 6);
  for (const row of rowsWithoutTop) {
    for (const cell of row) {
      const classList = getClassListArray(cell);
      if (!classList.includes("yellow") && !classList.includes("red")) {
        return;
      }
    }
  }
  let otherplayer = document.getElementById("otherplayer").value;
  gameIsLive = false;
  resetButton.disabled = false;
  statusSpan.textContent = "game is a tie";
  document.querySelector(".score").innerHTML =
    " score:<br><br>" +
    you +
    " - " +
    playerone +
    "<br><br>" +
    otherplayer +
    " - " +
    playertwo;
};
const handleCellMouseOver = (e) => {
  const cell = e.target;
  const [rowIndex, colIndex] = getCellLocation(cell);
  clearColorFromTop(colIndex);

  const topCells = topCellse[colIndex];
  topCells.classList.add(yellowIsNext ? "yellow" : "red");
};

const handleCellMouseOut = (e) => {
  const cell = e.target;
  const [rowIndex, colIndex] = getCellLocation(cell);
  clearColorFromTop(colIndex);
};
const handleCellClick = (e) => {
  if (!gameIsLive) return;
  const cell = e.target;
  const [rowIndex, colIndex] = getCellLocation(cell);

  const openCell = getFirstOpenCellForColumn(colIndex);

  if (!openCell) return;

  openCell.classList.add(yellowIsNext ? "yellow" : "red");
  checkStatusOfGame(openCell);

  yellowIsNext = !yellowIsNext;
  clearColorFromTop(colIndex);
  if (gameIsLive) {
    const topCells = topCellse[colIndex];
    topCells.classList.add(yellowIsNext ? "yellow" : "red");
  }
};
const connectfour = () => {
  for (const row of rows) {
    for (const cell of row) {
      cell.addEventListener("mouseover", handleCellMouseOver);
      cell.addEventListener("mouseout", handleCellMouseOut);
      cell.addEventListener("click", handleCellClick);
    }
  }
};

const reseting = () => {
  for (const row of rows) {
    for (const cell of row) {
      cell.classList.remove("red");
      cell.classList.remove("yellow");
      cell.classList.remove("win");
    }
  }
  resetButton.disabled = true;
  gameIsLive = true;
  yellowIsNext = true;
  statusSpan = "";
};
const letterContainer = document.getElementById("letter-container");
const optionsContainer = document.getElementById("options-container");
const userInputSection = document.getElementById("user-input-section");
const newGameContainer = document.getElementById("new-game-container");
const newGamebutton = document.getElementById("new-game-button");
const canvas = document.getElementById("cans");
const resultText = document.getElementById("result-text");

let options = {
  makkelijk: [
    "boom",
    "stoel",
    "appel",
    "vis",
    "hond",
    "kat",
    "brood",
    "lamp",
    "trein",
    "kaas",
    "jas",
    "maan",
    "huis",
    "fiets",
    "boek",
    "glas",
    "melk",
    "ster",
    "deur",
    "plant",
  ],
  gemiddeld: [
    "bakker",
    "klokken",
    "tunnel",
    "mieren",
    "prullenbak",
    "zwembad",
    "horloge",
    "kussen",
    "kalender",
    "winkel",
    "trommel",
    "schaduw",
    "peper",
    "regenboog",
    "sleutel",
    "olifant",
    "ladder",
    "spiegel",
    "schaatsen",
    "hamer",
  ],
  moeilijk: [
    "dauwdruppel",
    "muggenbult",
    "vleermuis",
    "regenwoud",
    "paraplu",
    "schoorsteen",
    "toetsenbord",
    "klavertje",
    "zandloper",
    "kangoeroe",
    "schubdieren",
    "brievenbus",
    "dromedaris",
    "bliksemstraal",
    "krokodil",
    "planetarium",
    "vioolconcert",
    "eskimo",
    "waterlelie",
    "kameleon",
  ],
};
let goedgeradenaantal = 0;
let aantalkeren = 0;

let gekozenwoord = "";

const displayOptions = () => {
  optionsContainer.innerHTML += `<h3>Selecteer een optie</h3>`;
  let buttonCon = document.createElement("article");
  for (let value in options) {
    buttonCon.innerHTML += `<button class="options" onclick="generateWord('${value}')">${value}</button>`;
  }
  optionsContainer.appendChild(buttonCon);
};
const blocker = () => {
  let optionsButtons = document.querySelectorAll(".options");
  let letterButtons = document.querySelectorAll(".letter");
  optionsButtons.forEach((button) => {
    button.disabled = true;
  });
  letterButtons.forEach((button) => {
    button.disabled = true;
  });
  newGameContainer.classList.remove("hide");
};
const generateWord = (optionValue) => {
  let optionsButtons = document.querySelectorAll(".options");
  optionsButtons.forEach((button) => {
    if (button.innerText.toLowerCase() === optionValue) {
      button.classList.add("active");
    }
    button.disabled = true;
  });
  letterContainer.classList.remove("hide");
  userInputSection.innerText = "";
  let optionArray = options[optionValue];
  gekozenwoord = optionArray[Math.floor(Math.random() * optionArray.length)];
  gekozenwoord = gekozenwoord.toUpperCase();
  let displayItem = gekozenwoord.replace(/./g, '<span class="dashes">_</span>');

  userInputSection.innerHTML = displayItem;
};

const initializer = () => {
  goedgeradenaantal = 0;
  aantalkeren = 0;

  userInputSection.innerHTML = "";
  optionsContainer.innerHTML = "";
  letterContainer.classList.add("hide");
  newGameContainer.classList.add("hide");
  letterContainer.innerHTML = "";

  for (let i = 65; i < 91; i++) {
    let button = document.createElement("button");
    button.classList.add("letters");

    button.innerText = String.fromCharCode(i);

    button.addEventListener("click", () => {
      let charArray = gekozenwoord.split("");
      let dashes = document.getElementsByClassName("dashes");
      if (charArray.includes(button.innerText)) {
        charArray.forEach((charArray, index) => {
          if (char === button.innerText) {
            dashes[index].innerText = char;

            goedgeradenaantal += 1;

            if (goedgeradenaantal == charArray.length) {
              resultText.innerHTML = `<h2 class='win-msg'>Je Hebt GeWonnen!!</h2><p>Het woord was <span>${gekozenwoord}</span></p>`;
              blocker();
            }
          }
        });
      } else {
        aantalkeren += 1;
        drawMan(aantalkeren);

        if (aantalkeren == 6) {
          resultText.innerHTML = `<h2 class='losw-msg'>Je Hebt VerLoren!!</h2><p>Het woord was <span>${gekozenwoord}</span></p>`;
          blocker();
        }
      }

      button.disabled = true;
    });

    letterContainer.appendChild(button);
  }
  displayOptions();
  let { initialDrawing } = canvasCreator();
  initialDrawing();
};

const canvasCreator = () => {
  let context = canvas.getContext("2d");
  context.beginPath();
  context.strokeStyle = "#000";
  context.lineWidth = 2;

  const drawLine = (fromX, fromY, toX, toY) => {
    context.moveTo(fromX, fromY);
    context.lineTo(toX, toY);
    context.stroke();
  };
  const head = () => {
    context.beginPath();
    context.arc(70, 30, 10, 0, Math.PI * 2, true);
    context.stroke();
  };

  const body = () => {
    drawLine(70, 40, 70, 80);
  };
  const leftArm = () => {
    drawLine(70, 50, 50, 70);
  };
  const rightArm = () => {
    drawLine(70, 50, 90, 70);
  };
  const leftLeg = () => {
    drawLine(70, 80, 50, 110);
  };
  const rightLeg = () => {
    drawLine(70, 80, 90, 110);
  };
  const initialDrawing = () => {
    context.clearRect(0, 0, context.canvas.width, context.canvas.height);

    drawLine(10, 130, 130, 130);

    drawLine(10, 10, 10, 131);
    drawLine(10, 10, 70, 10);

    drawLine(70, 10, 70, 20);
  };
  return { initialDrawing, head, body, leftArm, rightArm, leftLeg, rightLeg };
};
const drawMan = (aantalkeren) => {
  let { head, body, leftArm, rightArm, leftLeg, rightLeg } = canvasCreator();
  switch (aantalkeren) {
    case 1:
      head();
      break;
    case 2:
      body();
      break;
    case 3:
      leftArm();
      break;
    case 4:
      rightArm();
      break;
    case 5:
      leftLeg();
      break;
    case 6:
      rightLeg();
      break;
    default:
      break;
  }
};
newGamebutton.addEventListener("click", initializer);
window.onload = initializer;
console.log(gekozenwoord);

import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';

class Square extends React.Component {
  render() {
    return (
      <button className="square" 
              onClick={() => this.props.onClick()}>
        {this.props.value}
      </button>
    );
  }
}

// function Square(props) {
//   return (
//     <button className="square"
//             onClick={props.onClick}>
//       {props.value}
//     </button>
//   );
// }

class Board extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      squares: Array(9).fill(null), // X, O, null
      xIsNext: true,
      stackStates: Array(1).fill(this),
    }
  }

  handleClick(i) {
    const squares = this.state.squares.slice();
    if (calculateWinner(squares) || squares[i])
      return;
    squares[i] = this.state.xIsNext ? 'X' : 'O';
    const stack = this.state.stackStates.slice();
    stack.push(this.state);
    this.setState({squares: squares,
                   xIsNext: !this.state.xIsNext,
                   stackStates: stack});
  }

  renderSquare(i) {
    return (
      <Square value={this.state.squares[i]} // X, O, null
              onClick={() => this.handleClick(i)} 
      />
    );
  }

  handleClickStack(i) {
    const state = this.state.stackStates[i+1];
    this.setState(state);
  }

	renderStack() {
    return (
      <ol>
        {
          this.state.stackStates.map((item, index) => {
            return (
              <li key={index}>
                <button 
                  onClick={() => {
                    // const newStack = this.state.stackStates.slice(0, index);
                    // const newState = {...this.state};
                    // newState.stackStates = newStack;
                    // this.setState(newState);
                    this.handleClickStack(index)
                  }}
                >
                  Go back #{index}
                </button>
              </li>
            )
          })
        }
      </ol>
    );
  }

  renderStack2() {
    const stackSize = this.state.stackStates.length;
    let result = [<li><button onClick={() => this.handleClickStack(0)}>Go to game start</button></li>];
    for (let k=1; k<stackSize; k++) {
      result.push(<li><button onClick={() => this.handleClickStack(k)}>Go to move #{k}</button></li>);
    }
    return (
      <ol>{result}</ol>
    );
  }

  render() {
    const winner = calculateWinner(this.state.squares);
    let status;
    if (winner) {
      status = 'Winner: ' + winner;
    } else {
      status = 'Next player: ' + (this.state.xIsNext ? 'X' : 'O');
    }

    return (
      <div>
        <div>
          <div className="status">{status}</div>
          <div className="board-row">
            {this.renderSquare(0)}
            {this.renderSquare(1)}
            {this.renderSquare(2)}
          </div>
          <div className="board-row">
            {this.renderSquare(3)}
            {this.renderSquare(4)}
            {this.renderSquare(5)}
          </div>
          <div className="board-row">
            {this.renderSquare(6)}
            {this.renderSquare(7)}
            {this.renderSquare(8)}
          </div>
        </div>
        <div>
          {this.renderStack()}
        </div>
      </div>
    );
  }
}

class Game extends React.Component { // JSX
  render() {
    return (
      <div className="game">
        <div className="game-board">
          <Board />
        </div>
        <div className="game-info">
          <div>{/* status */}</div>
          <ol>{/* TODO */}</ol>
        </div>
      </div>
    );
  }
}

function calculateWinner(squares) {
  const lines = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6],
  ];
  for (let i = 0; i < lines.length; i++) {
    const [a, b, c] = lines[i];
    if (squares[a] && squares[a] === squares[b] && squares[a] === squares[c]) {
      return squares[a];
    }
  }
  return null;
}

// ========================================

ReactDOM.render(
  <Game />,
  document.getElementById('root')
);

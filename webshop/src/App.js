import React, { Component } from "react";
import logo from "./logo.svg";
import "./css//reset.css";
import "./css//bootstrap.css";
import "./css/App.css";
import Header from "./Header";
import Products from "./Products";


class App extends Component {
  render() {
    const characters = [
      {
        name: "diablo",
        price: "1000"
      },
      {
        name: "battlefield",
        price: "50"
      },
      {
        name: "pacman",
        price: "33,99"
      },
      {
        name: "tetris",
        price: "52.21"
      }
    ]
    return (
      <div className="App">
        {/* to do create head */}
        <Header />
        <body className="container-fluid">
          <Products characters={characters}/>
          <a>See more products</a>
        </body>
      </div>
    );
  }
}


export default App;

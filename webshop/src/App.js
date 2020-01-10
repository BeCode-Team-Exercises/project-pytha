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
        price_per_unit: 1000,
        tax_percentage: 21,
        description: "rpg game",
        developer: "developer",
        publisher: "publisher",
        platform: "pc",
        pegi:13,
        stock: 10,
        active_for_sale: 1
      },
      {
        name: "battlefield",
        price_per_unit: 50,
        tax_percentage: 21,
        description: "shooter",
        developer: "developer",
        publisher: "publisher",
        platform: "xbox",
        pegi:18,
        stock: 10,        
        active_for_sale: 1
      },
      {
        name: "pacman",
        price_per_unit: 33.99, 
        tax_percentage: 21,
        description: "platform game",
        developer: "developer",
        publisher: "publisher",
        platform: "pc",
        pegi:4,
        stock: 10,
        active_for_sale: 1
      },
      {
        name: "tetris",
        price_per_unit: 52.21,
        tax_percentage: 21,
        description: "oldest game, still relevant",
        developer: "developer",
        publisher: "publisher",
        platform: "gameboy",
        pegi:0,
        stock: 10,
        active_for_sale: 1
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

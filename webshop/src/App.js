import React, { Component } from "react";
import "./css//reset.css";
import "./css//bootstrap.css";
import "./css/App.css";
import Header from "./Header";
import Products from "./Products";

class App extends Component {
  constructor(props) {
    super(props);
        // to do: change stock to original stock of object and maybe even
    this.state = {
      stock: 10
    };
  }
  
  componentDidMount() {
    // test to see how it goes to connect api
    fetch(
      "https://api.openweathermap.org/data/2.5/forecast/?q=bruges,be&appid=fac9676aa8de6252977e1a8672e861e2"
    )
      .then(response => response.json())
      .then(data => this.setState({ data }))
  }

  render() {
    // note: will need to change this. Tried to preconfigure code before having actual db-connection on the basis of database names. But will still need to handle images (not currently foreseen in db)
    const characters = [
      {
        name: "diablo",
        price_per_unit: 1000,
        tax_percentage: 21,
        description: "rpg game",
        developer: "developer",
        publisher: "publisher",
        platform: "pc",
        pegi: 13,
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
        pegi: 18,
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
        pegi: 4,
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
        pegi: 0,
        stock: 10,
        active_for_sale: 1
      }
    ];
    return (
      <body className="container-fluid">
        {/* to do create head */}
        <Header />
        <Products characters={characters} />
        <a>See more products</a>
      </body>
    );
  }
}

export default App;

{
  /* note: may want to use state at products level to dynamically display type of products */
}

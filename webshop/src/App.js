import React, { Component } from "react";
import "./css//reset.css";
import "./css//bootstrap.css";
import "./css/App.css";
import Header from "./Header";
import Products from "./Products";

class App extends Component {
    // unable to add array to variable. However, able to add to state (what I don't prefer). No such method for props found thus far. Can add to state first, then pass to props and back again if needed?
   constructor(props) {
    super(props);
    this.state = {
      products_array : [
      ]
    };
  }
 componentDidMount() {
    fetch("http://project-pytha.local/webshop/api/product/read.php")
      .then(response => response.json())
      .then(data => data.records)
      //.then(data => console.log(data));
      .then(products_array => this.setState({ products_array }));
    } 

  render() {
/*     // note: will need to change this. Tried to preconfigure code before having actual db-connection on the basis of database names. But will still need to handle images (not currently foreseen in db)
    const products2 = [
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

    // I can pass array to products this way
    this.props = products2;
    console.log(products2);
    const products = this.props; */

    /* trying to add something to props 
    function Welcome(props) {
      return <h1>Hello, {props.name}</h1>;
    }
    
    function Test() {
      return (
        <div>
          <Welcome name="Sara" />
        </div>
      );
    } */


/* function Testje (props) {
  const { propstestjeconst } = props.propstestje;
  return <p> { propstestjeconst }</p>;
}
 */
    return (
      <body className="container-fluid">
        {/* to do create head */}
        <Header />
        <Products products={this.state.products_array}/>
{/*         <Testje propstestje="abc"/>
 */}        <a>See more products</a>
      </body>
    );
  }
}

export default App;

{
  /* note: may want to use state at products level to dynamically display type of products */
}

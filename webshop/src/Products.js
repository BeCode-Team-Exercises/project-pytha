import React, { Component } from "react";
import ProductCard from "./ProductCard";
import "./css/reset.css";
import "./css/bootstrap.css";
import "./css/App.css";

class Products extends Component {
  constructor(props) {
    super(props);
    this.state = {
      platform: "PC",
      order: [],
      orderStatus: "niets bevestigd"
    };

    this.handleInStockChange = this.handleInStockChange.bind(this);
  }

  // note: just created button to test database connection. Will need to be moved to confirm order
  // IMPORTANT: wil niet ambetant doen, maar die post creeert een nieuwe rij, wat prima is om nieuwe games toe te voegen. Maar als het gaat over de Stock van een game te updaten, is het mogelijk niet de juiste methode.
  testSendMethod = () => {
    console.log("test knop");

    const data = {
      name: "Jasper's Crazy Adventures abc",
      price_per_unit: 59,
      publisher: "Dysfunctional Analyzers!",
      developer: "Hobo's In Space!",
      platform: "PC",
      pegi: "18",
      ean: "0000000000003",
      stock: "5",
      description:
        "Go on a crazy adventure with Jasper the Jack of All Spades! Control your poop levels!"
    };

    // note: PUT doenst't work as a standard php method, so post is used
    fetch("http://project-pytha.local/webshop/api/product/create.php", {
      method: "POST", // or 'PUT'
      /*        headers: {
        // "Access-Control-Allow-Origin" : "*",
        "Content-Type": "application/json; charset=UTF-8",
        "Access-Control-Allow-Methods": "POST",
        "Access-Control-Max-Age": "3600",
        "Access-Control-Allow-Headers" : "Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With"
      },  */
      body: JSON.stringify(data)
    })
      .then(response => response.json())
      .then(data => {
        console.log("Success:", data);
      })
      .catch(error => {
        console.error("Error:", error);
      });
    // checken of het valid json is met output in console hierin te plakken https://jsonlint.com/
    console.log(JSON.stringify(data));
  };

  handleInStockChange(order) {
// add object to order
// TO DO: merge objects and count total number of the same object, subtract this from stock, return stock number to displayed stock
    this.setState({
      order: [...this.state.order, order],
    });
  }

  changePlatform = event => {
    //    console.log(event.target.value)
    const value = event.target.value;
    console.log(value);
    this.setState((state, props) => ({
      platform: value
    }));

    /*     this.setState((state, props) => ({
      // to do: add check to see if there still is something in stock - at least on the basis of first api-call
      // (possible that multiple people order at the same time and that the stock has changed in the meantime, but that's for later)
      platform: event.value
    })); */
  };

  testConfirmPurchaseButtonChangeApi = () => {
    console.log(this.props);
    console.log(this.state);
    this.setState(state => ({ orderStatus: "testChanged" }));
  };

  render() {
    const { products } = this.props;

    const Product = props => {
      const rows = products.map((row, index) => {
        // console.log(this.state.platform);
        if (row.platform == this.state.platform) {
          return (
            /*           <tr key={index}>
        <td>{row.name}</td>
        <td>{row.price}</td>
      </tr> */
            <ProductCard
              addToOrder={this.handleInStockChange}
              key={index}
              product_info={row}
            />
          );
        }
      });
      return rows;
    };

    return (
      <React.Fragment>
        <div className="row text-center h-100 mh-100">
          <h2 className="w-100">Products for platform {this.state.platform}</h2>
        </div>
        <article className="row p-1 h-100 mh-100">
          {/* note: probably a foreach loop needed with a backstop if there are too many elements to render. Waiting for API-connection*/}
          <Product />
        </article>
        <div className="row text-center platform_buttons h-100 mh-100">
          <input
            className="btn btn-info pl-5 pr-5"
            type="button"
            value="PC"
            onClick={this.changePlatform}
          />
          <input
            className="btn btn-info pl-5 pr-5"
            type="button"
            value="Xbox One"
            onClick={this.changePlatform}
          />
          <input
            className="btn btn-info pl-5 pr-5"
            type="button"
            value="Playstation 4"
            onClick={this.changePlatform}
          />
        </div>
        <div className="row text-center platform_buttons h-100 mh-100">
          <input
            className="btn btn-info pl-5 pr-5 mt-5"
            type="button"
            value="test confirm purchase button change api"
            onClick={this.testConfirmPurchaseButtonChangeApi}
          />
          <input
            className="btn btn-info pl-5 pr-5 mt-5"
            type="button"
            value="test send method"
            onClick={this.testSendMethod}
          />
        </div>
      </React.Fragment>
    );
  }
}

export default Products;

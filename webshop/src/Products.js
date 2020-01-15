import React, { Component } from "react";
import ProductCard from "./ProductCard";
import "./css/reset.css";
import "./css/bootstrap.css";
import "./css/App.css";

class Products extends Component {
  constructor(props) {
    super(props);
    this.state = {
      platform: "PC"
    };
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

  render() {
    const { products } = this.props;

    const Product = props => {
      const rows = products.map((row, index) => {
        console.log(this.state.platform);
        if (row.platform == this.state.platform) {
          return (
            /*           <tr key={index}>
        <td>{row.name}</td>
        <td>{row.price}</td>
      </tr> */
            <ProductCard key={index} product_info={row} />
          );
        }
      });
      return rows;
    };

    return (
      <React.Fragment>
        <div className="row text-center">
          <h2 className="w-100">Products for platform X (NEED TO UPDATE THIS: move state, move data up?)</h2>
        </div>
        <article className="row p-1">
          {/* note: probably a foreach loop needed with a backstop if there are too many elements to render. Waiting for API-connection*/}
          <Product />
        </article>
        <div className="row text-center platform_buttons">
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
      </React.Fragment>
    );
  }
}

export default Products;

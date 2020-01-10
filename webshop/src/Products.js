import React, { Component } from "react";
import ProductCard from "./ProductCard";
import "./css/reset.css";
import "./css/bootstrap.css";
import "./css/App.css";

class Products extends Component {
  render() {
    const { characters } = this.props;

    const Product = props => {
      const rows = characters.map((row, index) => {
        return (
/*           <tr key={index}>
            <td>{row.name}</td>
            <td>{row.price}</td>
          </tr> */
            <ProductCard key={index} product_info={row}/>
        );
      });

      return rows
    };

    return (
      <article className="row">
        {/* note: probably a foreach loop needed with a backstop if there are too many elements to render. Waiting for API-connection*/}
          <Product/>
      </article>
    );
  }
}

export default Products;

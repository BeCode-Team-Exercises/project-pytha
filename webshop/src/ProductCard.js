import React, { Component } from "react";
import "./css/reset.css";
import "./css/bootstrap.css";
import "./css/App.css";

class ProductCard extends Component {
  constructor(props) {
    super(props);
    // to do: change stock to original stock of object.
    // Also is this the best level for state or do I need to create a state that als ocaptures id of product
    this.state = {
      product_selected: "",
      stock: 10
    };
  }

  handleChange = event => {
    // also need to changed displayed stock on the basis of click
    this.setState((state, props) => ({
      product_selected: this.props.product_info.name,
      // to do: add check to see if there still is something in stock - at least on the basis of first api-call
      // (possible that multiple people order at the same time and that the stock has changed in the meantime, but that's for later)
      stock: this.state.stock - 1
    }));
  };

  render() {
    const { product_info } = this.props;

    const actual_price =
      parseInt(product_info.price_per_unit) + (
        parseInt(product_info.price_per_unit) * (parseInt(product_info.tax_percentage) / 100));

    return (
      <div className="card col-md-3">
        <img className="card-img-top" alt="" />
        <div className="card-body">
          <h5 className="card-title">{product_info.name}</h5>
          <p className="card-text">{product_info.description}</p>
          <p>{`in stock: ${product_info.stock}`}</p>
          <p>{`${actual_price} euro`}</p>
          <a href="" className="btn btn-primary">
            Go somewhere
          </a>
          <input type="button" value="Submit" onClick={this.handleChange} />
        </div>
      </div>
    );
  }
}

export default ProductCard;

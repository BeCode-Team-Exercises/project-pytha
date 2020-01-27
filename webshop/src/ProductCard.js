import React, { Component } from "react";
import "./css/reset.css";
import "./css/bootstrap.css";
import "./css/App.css";

class ProductCard extends Component {
  constructor(props) {
    super(props);
    this.handleChange2 = this.handleChange2.bind(this);
  }
  changeHigherState = () => {
    this.props.addToOrder(this.props.product_info);
  };

  handleChange2(e) {
    this.changeHigherState();
    // EDIT: CAN ONLY USE ONE OF THESE AT A TIME, I BELEIV DUE TO RENDER. WIL RECONFIGURE SO THAT LOCALSTATE TAKES IT VALUE FROM SOMEWHERE ELSE
    // NOTE: add check to see if there still is something in stock - at least on the basis of first api-call
    // NOTE(possible that multiple people order at the same time and that the stock has changed in the meantime, but that's for later)
  }

  render() {
    const { product_info } = this.props;

    const actual_price =
      parseInt(product_info.price_per_unit) +
      parseInt(product_info.price_per_unit) *
        (parseInt(product_info.tax_percentage) / 100);

    return (
      // note: had problems setting equal boxes with bootsstrap. Class overflow-hidden did not work as expected and set inline-styles here
      // to do: figure out styling in a more elegant manner
      <div className="col-md-3 text-center" style={{ height: "40rem" }}>
        <div className="card" style={{ height: "90%" }}>
          <img className="card-img-top" alt="" style={{ height: "25%" }} />
          <div className="card-body" style={{ height: "75%" }}>
            <h5 className="card-title" style={{ height: "10%" }}>
              {product_info.name}
            </h5>
            <p
              className="card-text"
              style={{ height: "50%", maxHeight: "100%", overflow: "scroll" }}
            >
              {product_info.description}
            </p>
            <p style={{ height: "5%" }}>{`in stock: ${product_info.stock}`}</p>
            <p style={{ height: "5%" }}>{`${actual_price} euro`}</p>
            {/*           <a href="" className="btn btn-primary">
            TO DO: MORE INFO POP-UP
          </a> */}
            <input
              className="btn btn-info"
              type="button"
              value="Submit"
              onClick={this.handleChange2}
              style={{ height: "15%", marginBottom: "15%" }}
            />
          </div>
        </div>
      </div>
    );
  }
}

export default ProductCard;

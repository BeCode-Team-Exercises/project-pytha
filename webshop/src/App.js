import React, { Component } from "react";
import logo from "./logo.svg";
import "./reset.css";
import "./bootstrap.css";
import "./App.css";
import Header from "./Header";
import Products from "./Products";


class App extends Component {
  render() {
    return (
      <div className="App">
        {/* to do create head */}
        <Header />
        <body className="container-fluid">
          <Products/>
        </body>
      </div>
    );
  }
}


export default App;

import React, { Component } from "react";
import "./css//reset.css";
import "./css//bootstrap.css";
import "./css/App.css";
import Products from "./Products";
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link,
  // useRouteMatch,
  // useParams
} from "react-router-dom";

// important to do/error: about me doesn't't remember products in order across tabs YET it does remember products that are out of stock. Is this even possible? Cookie? 

class App extends Component {
  // unable to add array to variable. However, able to add to state (what I don't prefer). No such method for props found thus far. Can add to state first, then pass to props and back again if needed?
  constructor(props) {
    super(props);
    this.state = {
      products_array: []
    };
  }
  componentDidMount() {
    fetch("http://project-pytha.local/webshop/api/product/read.php")
      // note: there's also the possiblity to query specifc products using http://localhost/project-pytha/webshop/api/product/search.php?search=V
      .then(response => response.json())
      .then(data => data.records)
      //.then(data => console.log(data));
      .then(products_array => this.setState({ products_array }));
  }

  render() {

    // note: had to change location because this was not accessible. Also: accessible with but not without arrow function notation
  const Products2 = () => {
      console.log(this.state);
            return (
                                     <Products products={this.state.products_array} />     
           );
        }

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

    return (
      <body className="container-fluid h-100 mh-100">
        {/* to do create head */}
        <header className="header">
          <h1 className="text-center">Game Planet</h1>
          <Router>
            <nav className="header-nav">
               <ul>
                {/*<li>
                  <Link to="/">Home</Link>
                </li> */}
                <li>
                  <Link to="/products">Products</Link>
                </li>
                <li>
                  <Link to="/about">About</Link>
                </li>
              </ul>
              {/* A <Switch> looks through its children <Route>s and
              renders the first one that matches the current URL.*/}
              <Switch>
                <Route path="/about">
                  <About />
                </Route>
                <Route path="/products">
                  <Products2 />
                </Route>
                {/* <Route path="/">
                  <Home />
                </Route> */}
              </Switch>
            </nav>
          </Router>
        </header>
{/*         <Products products={this.state.products_array} />
 */}        {/*         <Testje propstestje="abc"/>
         */}{" "}
      </body>
    );
    
    // function Home() {
    //   return <h2>Home</h2>;
    // }

    function About() {
      return <h2>About</h2>;
    }
  
}
} 
export default App;

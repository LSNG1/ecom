import React, { Component } from 'react';
import { CountryDropdown, RegionDropdown, CountryRegionData } from 'react-country-region-selector';

import axios from 'axios';
import { redirect } from 'react-router-dom';

export class Register extends Component {
  constructor(props) {
    super(props);

    this.state = {
      user: {
        email: '',
        password: '',
        name: '',
        lastname: '',
        country: '',
        region: '',
        birthdate: ''
      },
    };

    this.handleEmailChange = this.handleEmailChange.bind(this);
    this.handlePasswordChange = this.handlePasswordChange.bind(this);
    this.handleNameChange = this.handleNameChange.bind(this);
    this.handleLastNameChange = this.handleLastNameChange.bind(this);
    this.handleCountryChange = this.handleCountryChange.bind(this);
    this.handleBirthdateChange = this.handleBirthdateChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.handleRegionChange = this.handleRegionChange.bind(this);

  }

  handleEmailChange(event) {
    const user = { ...this.state.user, email: event.target.value };
    this.setState({ user });
  }

  handlePasswordChange(event) {
    const user = { ...this.state.user, password: event.target.value };
    this.setState({ user });
  }

  handleNameChange(event) {
    const user = { ...this.state.user, name: event.target.value };
    this.setState({ user });
  }

  handleLastNameChange(event) {
    const user = { ...this.state.user, lastname: event.target.value };
    this.setState({ user });
  }
  
  
  handleBirthdateChange(event) {
    const user = { ...this.state.user, birthdate: event.target.value };
    this.setState({ user });
  }
  
  handleCountryChange(val) {
    const user = { ...this.state.user, country: val };
    this.setState({ user });
  }

  handleRegionChange(val) {
    const user = { ...this.state.user, region: val };
    this.setState({ user });
  }

  

  
  // selectCountry (val) {
  //   this.setState({ country: val });
  // }

  // selectRegion (val) {
  //   this.setState({ region: val });
  // }

  handleSubmit(event) {
    event.preventDefault();
	

    let regex_email = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    let regex_country = /^[A-Za-z]+$/;
    let regex_name = /[A-Za-z]/;

    // if (!regex_email.test(this.state.user.email)) {
    //   alert("Invalid email address!");
    // } else {
    //   alert("Valid email address!");
    // }
    // if(!(regex_country.test(this.state.user.country)) && this.state.user.country.length < 3) {
    // 	alert("Invalid country")
    // } else {
    // 	alert("Country valid")
    // }
    // if(!regex_name.test(this.state.user.name)) {
    // 	alert("invalid name format")
    // } else {
    // 	alert("valid name")
    // }
    // if(!regex_name.test(this.state.user.lastname)) {
    // 	alert("invalid lastname format")
    // } else {
    // 	alert("valid lastname")
    // }



    // axios.post('http://localhost:8000/register', {name: "XD"},
    // {
    //   headers: {
    //   'Access-Control-Allow-Origin': '*',
    //   'Content-Type': 'application/json',
    //   }
    // })


    alert(typeof(this.state.user.country) );


    axios({
      method: 'get',
      url: 'http://localhost:8000/api/register',
      data: this.state.user
    })
    .then(window.location.href = 'http://localhost:8000/api/register')
    .then((response) => {
      console.log(response);
    })
    .catch((error) => {
      if (error.response) {
        console.log(error.response);
        console.log("server responded");
      } else if (error.request) {
        console.log("network error");
      } else {
        console.log(error);
      }
    });
    // .then(window.location.href = 'http://localhost:8000/register');


    // .then(redirect('https://localhost:8000/register'));
  }

  render() {
    return (
      <form onSubmit={this.handleSubmit}>
        <label>
          Email:
          <input type="text" value={this.state.user.email} onChange={this.handleEmailChange} />
        </label>
        <label>
          Password:
          <input type="password" value={this.state.user.password} onChange={this.handlePasswordChange} />
        </label>
        <label>
          Nom:
        <input type="text" value={this.state.user.name} onChange={this.handleNameChange} />
        </label>
        <label>
          Prénom:
        <input type="text" value={this.state.user.lastname} onChange={this.handleLastNameChange} />
        </label>
        <CountryDropdown
          value={this.state.user.country}
          onChange={(val) => this.handleCountryChange(val)} />

        <RegionDropdown
          country={this.state.user.country}
          value={this.state.user.region}
          onChange={(val) => this.handleRegionChange(val)} />
      
        {/* <label>
          Pays:
        <input type="text" value={this.state.user.country} onChange={this.handleCountryChange} />
        </label> */}
        <label>
          Date de naissance:
        <input type="date" value={this.state.user.birthdate} onChange={this.handleBirthdateChange} />
        </label>
        <input type="submit" value="Submit" />
      </form>
    );
    
  }
}

export default Register;

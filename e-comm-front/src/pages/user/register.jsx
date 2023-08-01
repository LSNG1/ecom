import React, { Component } from 'react';
import axios from 'axios';

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

  handleCountryChange(event) {
    const user = { ...this.state.user, country: event.target.value };
    this.setState({ user });
  }

  handleBirthdateChange(event) {
    const user = { ...this.state.user, birthdate: event.target.value };
    this.setState({ user });
  }


  handleSubmit(event) {
    event.preventDefault();

    let regex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

    if (!regex.test(this.state.user.email)) {
      alert("Invalid email address!");
    } else {
      alert("Valid email address!");
    }
    
    alert(this.state.user.birthdate);
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
        <label>
          Pays:
        <input type="text" value={this.state.user.country} onChange={this.handleCountryChange} />
        </label>
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

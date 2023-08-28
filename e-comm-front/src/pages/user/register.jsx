import React, { Component } from 'react';
import { CountryDropdown, RegionDropdown } from 'react-country-region-selector';
import axios from 'axios';
import bcrypt from 'bcryptjs';

const saltRounds = 10;

class Register extends Component {
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
        birthdate: '',
      },
      errors: {
        email: '',
        country: '',
        name: '',
        lastname: '',
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
    const user = { ...this.state.user, country: val, region: '' };
    this.setState({ user });
  }

  handleRegionChange(val) {
    const user = { ...this.state.user, region: val };
    this.setState({ user });
  }

  handleSubmit(event) {
    event.preventDefault();

    // Validate input here
    const { email, country, name, lastname } = this.state.user;
    const errors = {};

    if (!email.match(/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/)) {
      errors.email = 'Invalid email address';
    }

    if (!country.match(/^[A-Za-z]+$/) || country.length < 3) {
      errors.country = 'Invalid country';
    }

    if (!name.match(/[A-Za-z]/)) {
      errors.name = 'Invalid name';
    }

    if (!lastname.match(/[A-Za-z]/)) {
      errors.lastname = 'Invalid last name';
    }

    if (Object.keys(errors).length > 0) {
      this.setState({ errors });
      return;
    }

    const hashedPassword = bcrypt.hashSync(this.state.user.password, saltRounds);
    const userWithHashedPassword = { ...this.state.user, password: hashedPassword };

    axios
      .post('http://localhost:8000/api/users', userWithHashedPassword)
      .then((response) => {
        console.log(response);
      })
      .catch((error) => {
        if (error.response) {
          console.log(error.response);
          console.log('Server responded');
        } else if (error.request) {
          console.log('Network error');
        } else {
          console.log(error);
        }
      });

    // Submit user cart information
    fetch('http://localhost:8000/api/user_carts', {
      method: 'POST',
      headers: {
        accept: 'application/ld+json',
        'Content-Type': 'application/ld+json',
      },
      body: JSON.stringify({
        idUser: 1,
        items: '',
      }),
    });
  }

  render() {
    const { user, errors } = this.state;

    return (
      <form className="max-w-md mx-auto p-4 bg-white shadow-md rounded-lg" onSubmit={this.handleSubmit}>
        <label className="block mb-2">
          Email:
          <input
            className={`w-full mt-1 p-2 border ${errors.email ? 'border-red-500' : 'border-gray-300'}`}
            type="text"
            value={user.email}
            onChange={this.handleEmailChange}
          />
          {errors.email && <span className="text-red-500 text-sm">{errors.email}</span>}
        </label>
        <label className="block mb-2">
          Password:
          <input
            className="w-full mt-1 p-2 border border-gray-300"
            type="password"
            value={user.password}
            onChange={this.handlePasswordChange}
          />
        </label>
        <label className="block mb-2">
          Name:
          <input
            className={`w-full mt-1 p-2 border ${errors.name ? 'border-red-500' : 'border-gray-300'}`}
            type="text"
            value={user.name}
            onChange={this.handleNameChange}
          />
          {errors.name && <span className="text-red-500 text-sm">{errors.name}</span>}
        </label>
        <label className="block mb-2">
          Last Name:
          <input
            className={`w-full mt-1 p-2 border ${errors.lastname ? 'border-red-500' : 'border-gray-300'}`}
            type="text"
            value={user.lastname}
            onChange={this.handleLastNameChange}
          />
          {errors.lastname && <span className="text-red-500 text-sm">{errors.lastname}</span>}
        </label>
        <CountryDropdown
          className={`w-full mt-1 p-2 border ${errors.country ? 'border-red-500' : 'border-gray-300'}`}
          value={user.country}
          onChange={this.handleCountryChange}
        />
        <RegionDropdown
          className="w-full mt-1 p-2 border border-gray-300"
          country={user.country}
          value={user.region}
          onChange={this.handleRegionChange}
        />
        <label className="block mb-2">
          Birthdate:
          <input
            className="w-full mt-1 p-2 border border-gray-300"
            type="date"
            value={user.birthdate}
            onChange={this.handleBirthdateChange}
          />
        </label>
        <button
          className="w-full p-2 mt-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600"
          type="submit"
        >
          Submit
        </button>
      </form>
    );
  }
}

export default Register;

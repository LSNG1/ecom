import React, { Component } from 'react';
import axios from 'axios';


export class Login extends Component {
  constructor(props) {
    super(props);

    this.state = {
      user: {
        email: '',
        password: ''
      }
    }

    this.handleChangeEmail = this.handleChangeEmail.bind(this);
    this.handleChangePassword = this.handleChangePassword.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);

  }

handleChangeEmail(e) {
  const user = { ...this.state.user, email: e.target.value };
  this.setState({ user });
}

handleChangePassword(e) {
  const user = { ...this.state.user, email: e.target.value };
  this.setState({ user });
}


handleSubmit(e) {


  e.preventDefault();



  alert(this.state.user.email)

  axios({
    method: 'get',
    url: 'http://localhost:8000/api/register',
    data: this.state.user,
  })
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
}



render() {
    return (
      <div>
        <form onSubmit={this.handleSubmit}>
          <label>
            Email:
            <input type="text" value={this.state.email} onChange={this.handleChangeEmail}/>
          </label>
          <label>
            Password:
            <input type="password" value={this.state.password} onChange={this.handleChangePassword}/>
          </label>
          <input type="submit" />
        </form>
      </div>
    )
  }
}

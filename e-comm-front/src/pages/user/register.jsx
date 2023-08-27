import React, { Component } from 'react';
import { CountryDropdown, RegionDropdown } from 'react-country-region-selector';
import axios from 'axios';
import bcrypt from 'bcryptjs';

const saltRounds = 10;

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
      }
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

    const hashedPassword = bcrypt.hashSync(this.state.user.password, saltRounds);
    const userWithHashedPassword = { ...this.state.user, password: hashedPassword };
	//     let regex_email = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    // let regex_country = /^[A-Za-z]+$/;
    // let regex_name = /[A-Za-z]/;

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

    console.log(userWithHashedPassword);

    axios({
      method: 'post',
      url: 'http://localhost:8000/api/users',
      data: userWithHashedPassword
    })
      .then((response) => {
        console.log(response);
      })
      .catch((error) => {
        if (error.response) {
          console.log(error.response);
          console.log('server responded');
        } else if (error.request) {
          console.log('network error');
        } else {
          console.log(error);
        }
      });
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
          PrÃ©nom:
        <input type="text" value={this.state.user.lastname} onChange={this.handleLastNameChange} />
        </label>
        <CountryDropdown
          value={this.state.user.country}
          onChange={(val) => this.handleCountryChange(val)} />

        <RegionDropdown
          country={this.state.user.country}
          value={this.state.user.region}
          onChange={(val) => this.handleRegionChange(val)} />
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
// import React from "react";
// import { TEInput, TERipple } from "tw-elements-react";

// export default function Register(): JSX.Element {
//   return (
//     <section className="mt-10">
//       <div className="container h-full px-6 py-24">
//         <div className="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
//           {/* <!-- Left column container with background--> */}
//           <div className="mb-12 md:mb-0 md:w-8/12 lg:w-6/12">
//             <img
//               src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
//               className="w-full"
//               alt="Phone image"
//             />
//           </div>

//           {/* <!-- Right column container with form --> */}
//           <div className="md:w-8/12 lg:ml-6 lg:w-5/12">
//             <form>
//               {/* <!-- Email input --> */}
//               <TEInput
//                 type="email"
//                 label="Email address"
//                 size="lg"
//                 className="mb-6"
//               ></TEInput>

//               {/* <!--Password input--> */}
//               <TEInput
//                 type="password"
//                 label="Password"
//                 className="mb-6"
//                 size="lg"
//               ></TEInput>

//               {/* <!-- Remember me checkbox --> */}
//               <div className="mb-6 flex items-center justify-between">
//                 <div className="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
//                   <input
//                     className="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
//                     type="checkbox"
//                     value=""
//                     id="exampleCheck3"
//                     defaultChecked
//                   />
//                   <label
//                     className="inline-block pl-[0.15rem] hover:cursor-pointer"
//                     htmlFor="exampleCheck3"
//                   >
//                     Remember me
//                   </label>
//                 </div>

//                 {/* <!-- Forgot password link --> */}
//                 <a
//                   href="#!"
//                   className="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600"
//                 >
//                   Terms and conditions
//                 </a>
//               </div>

//               {/* <!-- Submit button --> */}

//               <TERipple rippleColor="light" className="w-full">
//                 <button
//                   type="button"
//                   className="inline-block w-full rounded bg-primary px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
//                 >
//                   Sign up
//                 </button>
//               </TERipple>

//               {/* <!-- Divider --> */}
//               <div className="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
//                 <p className="mx-4 mb-0 text-center font-semibold dark:text-neutral-200">
//                   OR
//                 </p>
//               </div>

//               {/* <!-- Social login buttons --> */}
//               <TERipple rippleColor="light" className="w-full">
//                 <a
//                   className="mb-3 flex w-full items-center justify-center rounded bg-primary px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
//                   style={{ backgroundColor: "#3b5998" }}
//                   href="#!"
//                   role="button"
//                 >
//                   {/* <!-- Facebook --> */}
//                   <svg
//                     xmlns="http://www.w3.org/2000/svg"
//                     className="mr-2 h-3.5 w-3.5"
//                     fill="currentColor"
//                     viewBox="0 0 24 24"
//                   >
//                     <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
//                   </svg>
//                   Continue with Facebook
//                 </a>
//               </TERipple>
//               <TERipple rippleColor="light" className="w-full">
//                 <a
//                   className="mb-3 flex w-full items-center justify-center rounded bg-info px-7 pb-2.5 pt-3 text-center text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]"
//                   style={{ backgroundColor: "#55acee" }}
//                   href="#!"
//                   role="button"
//                 >
//                   {/* <!-- Twitter --> */}
//                   <svg
//                     xmlns="http://www.w3.org/2000/svg"
//                     className="mr-2 h-3.5 w-3.5"
//                     fill="currentColor"
//                     viewBox="0 0 24 24"
//                   >
//                     <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
//                   </svg>
//                   Continue with Twitter
//                 </a>
//               </TERipple>
//             </form>
//           </div>
//         </div>
//       </div>
//     </section>
//   );
// }
import React, { useState } from 'react';
import axios from 'axios';
import { TextField, Box, Button, Container, Typography, Checkbox, FormControlLabel, Grid, Paper, CssBaseline } from '@mui/material';
import Link from '@mui/material/Link';
import { useNavigate } from 'react-router-dom';

export const Login = () => {
	const navigate = useNavigate();

	const [email, setEmail] = useState('');
	const [password, setPassword] = useState('');

	const handleEmailChange = (event) => {
		setEmail(event.target.value);
	};

	const handlePasswordChange = (event) => {
		setPassword(event.target.value);
	};

	const handleSubmit = async (event) => {
		event.preventDefault();

		try {
			const response = await axios.post('http://localhost:8000/api/login', { email, password });
			console.log(response.data.token);
			if (response.data.token) {
				localStorage.setItem('token', response.data.token);
				navigate('/');
			}
		} catch (error) {
			console.log(error);
		}
	};

	return (
		<div className="flex items-center justify-center min-h-screen bg-gray-100">
			<Container component="main" maxWidth="xs">
				<CssBaseline />
				<Paper elevation={6} square className="p-4">
					<Box className="my-8 flex flex-col items-center">
						<Typography component="h1" variant="h5" className="mb-4">
							Sign in
						</Typography>
						<form noValidate onSubmit={handleSubmit} className="w-full">
							<TextField
								margin="normal"
								required
								fullWidth
								id="email"
								label="Email Address"
								name="email"
								autoComplete="email"
								autoFocus
								value={email}
								onChange={handleEmailChange}
								className="mb-4"
							/>
							<TextField
								margin="normal"
								required
								fullWidth
								name="password"
								label="Password"
								type="password"
								id="password"
								autoComplete="current-password"
								value={password}
								onChange={handlePasswordChange}
								className="mb-4"
							/>
							<FormControlLabel
								control={<Checkbox value="remember" color="primary" />}
								label="Remember me"
								className="mb-4"
							/>
							<Button type="submit" fullWidth variant="contained" className="mb-4 bg-blue-500 hover:bg-blue-600 text-white">
								Sign In
							</Button>
							<Grid container>
								<Grid item xs>
									<Link href="#" variant="body2">
										Forgot password?
									</Link>
								</Grid>
								<Grid item>
									<Link href="#" variant="body2">
										{"Don't have an account? Sign Up"}
									</Link>
								</Grid>
							</Grid>
						</form>
					</Box>
				</Paper>
			</Container>
		</div>
	);
};

export default Login;

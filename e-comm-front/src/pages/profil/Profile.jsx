import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { Box, Container, Typography, Paper, CssBaseline, Button, TextField } from '@mui/material';

export const Profile = () => {
  const [userData, setUserData] = useState(null);
  const [isEditing, setIsEditing] = useState(false);
  const [updatedUserData, setUpdatedUserData] = useState({});
  const token = localStorage.getItem('token'); 
  useEffect(() => {
    const fetchUserData = async () => {
      try {
        const id = localStorage.getItem('userId');
        const response = await axios.get(`http://localhost:8000/api/users/${id}`, {
          headers: {

		},
        });
        setUserData(response.data);
        setUpdatedUserData(response.data);
      } catch (error) {
        console.error(error);
      }
    };


    const id = localStorage.getItem('userId');

    if (id && token) {
      fetchUserData();
    }
  }, [token]);

  const handleEditClick = () => {
    setIsEditing(true);
  };

  const handleCancelEdit = () => {
    setIsEditing(false);
    setUpdatedUserData(userData);
  };

  const handleSaveEdit = async () => {
    try {
      const id = localStorage.getItem('userId'); // Get the user ID from localStorage
      await axios.put(`http://localhost:8000/api/users/${id}`, updatedUserData, {
        headers: {
        },
      });
      setIsEditing(false);
    } catch (error) {
      console.error(error);
    }
  };

  const handleFieldChange = (event) => {
    const { name, value } = event.target;
    setUpdatedUserData((prevData) => ({
      ...prevData,
      [name]: value,
    }));
  };

  return (
    <div className="flex items-center justify-center min-h-screen bg-gray-100">
      <Container component="main" maxWidth="xs">
        <CssBaseline />
        <Paper elevation={6} square className="p-4">
          <Box className="my-8 flex flex-col items-center">
            <Typography component="h1" variant="h5" className="mb-4">
              Profile
            </Typography>
            {userData ? (
              <div>
                <p>ID: {userData.id}</p>
                <p>Email: {userData.email}</p>
                <p>Last Name: {userData.lastname}</p>
                <p>Birthdate: {userData.birthdate}</p>
                <p>Country: {userData.country}</p>
                <p>Region: {userData.region}</p>
                {isEditing ? (
                  <div>
                    <TextField
                      fullWidth
                      label="Email"
                      name="email"
                      value={updatedUserData.email}
                      onChange={handleFieldChange}
                      className="mb-2"
                    />
                    <TextField
                      fullWidth
                      label="Last Name"
                      name="lastname"
                      value={updatedUserData.lastname}
                      onChange={handleFieldChange}
                      className="mb-2"
                    />
                    <TextField
                      fullWidth
                      label="Birthdate"
                      name="birthdate"
                      value={updatedUserData.birthdate}
                      onChange={handleFieldChange}
                      className="mb-2"
                    />
                    <TextField
                      fullWidth
                      label="Country"
                      name="country"
                      value={updatedUserData.country}
                      onChange={handleFieldChange}
                      className="mb-2"
                    />
                    <TextField
                      fullWidth
                      label="Region"
                      name="region"
                      value={updatedUserData.region}
                      onChange={handleFieldChange}
                      className="mb-4"
                    />
                  </div>
                ) : null}
                {isEditing ? (
                  <div>
                    <Button
                      variant="contained"
                      color="primary"
                      onClick={handleSaveEdit}
                      className="mb-2"
                    >
                      Save
                    </Button>
                    <Button
                      variant="outlined"
                      color="secondary"
                      onClick={handleCancelEdit}
                    >
                      Cancel
                    </Button>
                  </div>
                ) : (
                  <Button
                    variant="outlined"
                    onClick={handleEditClick}
                    className="mb-2"
                  >
                    Edit
                  </Button>
                )}
              </div>
            ) : (
              <p>Loading user data...</p>
            )}
          </Box>
        </Paper>
      </Container>
    </div>
  );
};

export default Profile;

import React, { useState } from 'react';

export const User = () => {
  const [isEditing, setIsEditing] = useState(false);
  const [fullName, setFullName] = useState('username');

  const handleNameChange = (e) => {
    setFullName(e.target.value);
  };

  const handleEditClick = () => {
    setIsEditing(true);
  };

  const handleSaveClick = () => {
    setIsEditing(false);
    // Vous pouvez ici implémenter la logique pour enregistrer les modifications dans la base de données ou l'état global de votre application
  };

  return (
    <div>
      {isEditing ? (
        <>
          {/* Champ d'édition du nom */}
          <input type="text" value={fullName} onChange={handleNameChange} />

          {/* Bouton de sauvegarde */}
          <button onClick={handleSaveClick}>Enregistrer</button>
        </>
      ) : (
        <>
          {/* Nom Prénom */}
          <h2>{fullName}</h2>

          {/* Bouton d'édition de profil */}
          <button onClick={handleEditClick}>Editer le profil</button>

          {/* Bouton de déconnexion */}
          <button>Se déconnecter</button>
        </>
      )}
    </div>
  );
};
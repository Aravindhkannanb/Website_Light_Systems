function isValidPhoneNumber(PhoneNumber) {
    const phoneRegex = /^\+?[0-9()-\s]+$/;
  
    const cleanedPhoneNumber = PhoneNumber.replace(/[^\d]/g, '');
  
    return phoneRegex.test(cleanedPhoneNumber);
  }
import React from 'react';

import { withNavigation } from 'react-navigation';

class PrimaryButton extends React.Component {
  render() {
    // return <button title="Back" onPress={() => { this.props.navigation.navigate('County') }} />;
  }
}

// withNavigation returns a component that wraps MyBackButton and passes in the
// navigation prop
export default withNavigation(PrimaryButton);
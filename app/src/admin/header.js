import { __ } from "@wordpress/i18n";
import { Container, Heading, Box, Stack, Text, Divider } from '@chakra-ui/react'

export default () => {
	return (
		<Stack w="100%" maxW="100%">
			<Container p="40px 60px" maxW="100%" bgGradient='linear(to-r, #b621fe, #1fd1f9)' w="100%" m="0 auto" >
				<Box m="0 auto" maxW={'7xl'}>
					<Heading color="#ffffff" mb="5">{__("Premio Cart Trigger", "premio-carttrigger")}</Heading>
					<Divider orientation='horizontal' />
					<Box pt='3' maxW='3xl'>
						<Text color="#ffffff" fontSize='xl'>{__("This is a simple cart trigger plugin for WooCommerce. It allows you to trigger an action when a certain amount of cart items is added to the cart.", "premio-carttrigger")}</Text>
					</Box>
				</Box>
			</Container>
		</Stack>
	);
};

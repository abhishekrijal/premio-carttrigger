import Header from './header';
import Testimonials from './testimonials';
import NavTabs from './navTabs';
import Form from './form';
import { __ } from '@wordpress/i18n';
export default () => {
	return (
		<>
			<Header />
			<NavTabs />
			<Form />
		</>
	)
};

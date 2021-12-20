import { Tabs, TabList, TabPanels, Tab, TabPanel } from "@chakra-ui/react";
export default () => {
	return (
		<Tabs>
			<TabList>
				<Tab>General Settings</Tab>
				<Tab>Documentation</Tab>
			</TabList>

			<TabPanels>
				<TabPanel>
					<p>one!</p>
				</TabPanel>
				<TabPanel>
					<p>two!</p>
				</TabPanel>
			</TabPanels>
		</Tabs>
	)

}

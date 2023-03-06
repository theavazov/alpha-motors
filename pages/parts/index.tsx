import { CustomHead } from "../../components/CustomHead";
import { Form } from "../../components/form/Form";
import { Layout } from "../../components/Layout";
import { Location } from "../../components/location/Location";

export default function AboutPage() {
  return (
    <>
      <CustomHead title={"Alpha motors | Spare parts"} />
      <Layout>
        <Location title="Spare parts" location="Spare parts" />
        <Form />
      </Layout>
    </>
  );
}

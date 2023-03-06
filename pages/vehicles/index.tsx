import { Layout } from "../../components/Layout";
import { Location } from "../../components/location/Location";
import { CustomHead } from "../../components/CustomHead";
import { Form } from "../../components/form/Form";

export default function AboutPage() {
  return (
    <>
      <CustomHead title={"Alpha motors | Cars"} />
      <Layout>
        <Location title="Cars" location="Cars" />
        <Form />
      </Layout>
    </>
  );
}

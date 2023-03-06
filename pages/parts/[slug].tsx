import { CustomHead } from "../../components/CustomHead";
import { Form } from "../../components/form/Form";
import { Layout } from "../../components/Layout";
import { Location } from "../../components/location/Location";

export default function AboutPage() {
  return (
    <>
      <CustomHead title={"Alpha motors | Parts inner page"} />
      <Layout>
        <Location
          parent={{ text: "Spare parts", url: "/parts" }}
          title="Inner page"
          location="Inner page"
        />
        <Form />
      </Layout>
    </>
  );
}
